<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bcategory;
use App\Models\Blog;
use App\Models\BlogFaq;
use App\Models\Faq;
use App\Models\Language;
use App\Models\Megamenu;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Session;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $lang_id         = $lang->id;
        $data['lang_id'] = $lang_id;

        $data['blogs'] = Blog::where('language_id', $lang_id)
            ->orderBy('id', 'DESC')
            ->get();

        $data['bcats'] = Bcategory::where('language_id', $lang_id)
            ->where('status', 1)->get();

        $data['tags'] = Tag::get();

        $data['faqs'] = Faq::where('language_id', $lang_id)->get();
        return view('admin.blog.blog.index', $data);
    }

    /**
     * @throws Exception
     */
    public function getAjaxBlogs(Request $request)
    {
        $lang    = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;

        $data = Blog::with('bcategory')
            ->where('language_id', $lang_id)
            ->orderBy('id', 'DESC')
            ->get(['id', 'main_image', 'title', 'slug','status', 'bcategory_id', 'created_at', 'serial_number', 'breaking_news']);

        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }


    public function edit($id)
    {
        // $data['sites'] = loadSitesSelection();
       $data['blog']  = Blog::findOrFail($id);
        $data['bcats'] = Bcategory::where('language_id', $data['blog']->language_id)->where('status', 1)->get();
        $data['tags']  = Tag::get();
        return view('admin.blog.blog.edit', $data);
    }

    public function store(Request $request)
    {
        
        $image       = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $extImage    = pathinfo($image, PATHINFO_EXTENSION);

        $messages = [
            'language_id.required'    => 'The language field is required',
            'faq_question.*.required' => 'All FAQ questions must be filled or the empty one should be removed.',
            'faq_answer.*.required'   => 'All FAQ answers must be filled or the empty one should be removed.',
        ];

        $slug = make_slug($request->title);

        $rules = [
            'language_id'    => 'required',
            'faq_question.*' => 'required',
            'faq_answer.*'   => 'required',
            'excerpt'        => 'required|max:200',
            'image'          => 'required',
            'title'          => [
                'required',
                'max:255',
                function ($attribute, $value, $fail) use ($slug) {
                    $blogs = Blog::all();
                    foreach ($blogs as $key => $blog) {
                        if (strtolower($slug) == strtolower($blog->slug)) {
                            $fail('The title field must be unique.');
                        }
                    }
                }
            ],
            'category'       => 'required',
            'status'       => 'required',
            'content'        => 'required',
            'serial_number'  => 'integer',
        ];
        if ($request->filled('image')) {
            $rules['image'] = [
                function ($attribute, $value, $fail) use ($extImage, $allowedExts) {
                    if (!in_array($extImage, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg, svg image is allowed");
                    }
                }
            ];
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $blog               = new Blog;
        $blog->language_id  = $request->language_id;
        $blog->title        = $request->title;
        $blog->slug         = $slug;
        $blog->bcategory_id = $request->category;
        $this->saveBlogPost($request, $blog);

        

        if ($request->filled('image')) {
            $filename = ltrim(parse_url($image, PHP_URL_PATH));

            $blog->main_image = $filename;
        }

        $blog->save();
        $blog->tags()->sync($request->tags);

        $this->setFAQForBlogs($request, $blog);

        Session::flash('success', 'Blog added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $slug   = make_slug($request->title);
        $blog   = Blog::findOrFail($request->blog_id);
        $blogId = $request->blog_id;

        $image       = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $extImage    = pathinfo($image, PATHINFO_EXTENSION);

        $rules = [
            'title'          => [
                'required',
                'max:255',
                function ($attribute, $value, $fail) use ($slug, $blogId) {
                    $blogs = Blog::all();
                    foreach ($blogs as $key => $blog) {
                        if ($blog->id != $blogId && strtolower($slug) == strtolower($blog->slug)) {
                            $fail('The title field must be unique.');
                        }
                    }
                }
            ],
            'category'       => 'required',
            'status'         =>'required',
            'content'        => 'required',
            'serial_number'  => 'integer',
            //all the index in array of faq_question and faq_answer is required
            'faq_question.*' => 'required',
            'faq_answer.*'   => 'required',
            'excerpt'        => 'required|max:200',
        ];

        $messages = [
            'faq_question.*.required' => 'All FAQ questions must be filled or the empty one should be removed.',
            'faq_answer.*.required'   => 'All FAQ answers must be filled or the empty one should be removed.',
        ];

        if ($request->filled('image')) {
            $rules['image'] = [
                function ($attribute, $value, $fail) use ($extImage, $allowedExts) {
                    if (!in_array($extImage, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg, svg image is allowed");
                    }
                }
            ];
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $blog               = Blog::findOrFail($request->blog_id);
        $blog->title        = $request->title;
        $blog->slug         = $slug;
        $blog->status          = $request->status;
        $blog->bcategory_id = $request->category;
        $this->saveBlogPost($request, $blog);

        $blog->tags()->sync($request->tags);

        if ($request->filled('image')) {
            $filename = ltrim(parse_url($image, PHP_URL_PATH));

            $blog->main_image = $filename;
        }

        $blog->save();

        // Save new FAQs
        // Delete existing FAQs
        //BlogFaq::where('blog_id', $blog->id)->delete();
        //$this->setFAQForBlogs($request, $blog);

        Session::flash('success', 'Blog updated successfully!');
        return "success";
    }

    public function deleteFromMegaMenu($blog)
    {
        // unset service from megamenu for service_category = 1
        $megamenu = Megamenu::where('language_id', $blog->language_id)->where('category', 1)->where('type', 'blogs');
        if ($megamenu->count() > 0) {
            $megamenu = $megamenu->first();
            $menus    = json_decode($megamenu->menus, true);
            $catId    = $blog->bcategory->id;
            if (is_array($menus) && array_key_exists("$catId", $menus)) {
                if (in_array($blog->id, $menus["$catId"])) {
                    $index = array_search($blog->id, $menus["$catId"]);
                    unset($menus["$catId"]["$index"]);
                    $menus["$catId"] = array_values($menus["$catId"]);
                    if (count($menus["$catId"]) == 0) {
                        unset($menus["$catId"]);
                    }
                    $megamenu->menus = json_encode($menus);
                    $megamenu->save();
                }
            }
        }
    }

    public function delete(Request $request)
    {

        $blog = Blog::findOrFail($request->blog_id);
        @unlink('assets/frontend/images/blogs/' . $blog->main_image);

        $this->deleteFromMegaMenu($blog);

        $blog->delete();

        Session::flash('success', 'Blog deleted successfully!');
        return back();
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $blog = Blog::findOrFail($id);
            @unlink('assets/frontend/images/blogs/' . $blog->main_image);

            $this->deleteFromMegaMenu($blog);

            $blog->delete();
        }

        Session::flash('success', 'Blogs deleted successfully!');
        return "success";
    }


    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getcats($langid)
    {
        return Bcategory::where('language_id', $langid)
            ->get();
    }

    public function sidebar(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $blog->breaking_news = $request->breaking_news;
        $blog->save();

        if ($request->breaking_news == 1) {
            Session::flash('success', 'Enabled successfully!');
        } else {
            Session::flash('success', 'Disabled successfully!');
        }

        return back();
    }

    private function saveBlogPost(Request $request, Blog $blog): void
    {
        $blog->content           = str_replace(url('/') . '/assets/frontend/images/', "/assets/frontend/images/", $request->content);
        $blog->excerpt           = $request->excerpt;
        $blog->meta_keywords     = $request->meta_keywords;
        $blog->alt_text          = $request->alt_text;
        $blog->status          = $request->status;
        $blog->serial_number     = 1;
        $blog->image_description = $request->image_description;
        $blog->meta_description  = $request->meta_description;
    }

    /**
     * @param Request $request
     * @param Blog $blog
     */
    private function setFAQForBlogs(Request $request, Blog $blog): void
    {
        $faq_questions = $request->input('faq_question');
        $faq_answers   = $request->input('faq_answer');
        if (!is_null($faq_questions) && !is_null($faq_answers)) {
            for ($i = 0; $i < count($faq_questions); $i++) {
                BlogFaq::create([
                    'site_id'  => session('siteId'),
                    'blog_id'  => $blog->id,
                    'question' => $faq_questions[$i],
                    'answer'   => $faq_answers[$i]
                ]);
            }
        }
    }
}

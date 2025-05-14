<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\Gallery;
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

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $lang_id         = $lang->id;
        $data['lang_id'] = $lang_id;

        $data['galleries'] = Gallery::where('language_id', $lang_id)
            ->orderBy('id', 'DESC')
            ->get();

        $data['categoryInfo'] = GalleryCategory::where('language_id', $lang_id)
            ->where('status', 1)->get();
        return view('admin.gallery.index', $data);
    }



    public function edit($id)
    {
        // $data['sites'] = loadSitesSelection();
       $data['gallery']  = Gallery::findOrFail($id);
        $data['categories'] = GalleryCategory::where('language_id', $data['gallery']->language_id)->where('status', 1)->get();
        return view('admin.gallery.edit', $data);
    }

    public function store(Request $request)
    {   
        $image       = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $extImage    = pathinfo($image, PATHINFO_EXTENSION);

        $messages = [
            'language_id.required'    => 'The language field is required',
        ];

        $slug = make_slug($request->title);

        $rules = [
            'language_id'    => 'required',
            'image'          => 'required',
            'title'          => [
                'required',
                'max:255',
                function ($attribute, $value, $fail) use ($slug) {
                    $gallery = Gallery::all();
                    foreach ($gallery as $key => $gallery) {
                        if (strtolower($slug) == strtolower($gallery->slug)) {
                            $fail('The title field must be unique.');
                        }
                    }
                }
            ],
            'category_id'       => 'required',
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
        $gallery               = new Gallery;
        $gallery->language_id  = $request->language_id;
        $gallery->title        = $request->title;
        $gallery->category_id = $request->category_id;
        $this->saveGallery($request, $gallery);

        

        if ($request->filled('image')) {
            $filename = ltrim(parse_url($image, PHP_URL_PATH));
            $gallery->image = $filename;
        }

        $gallery->save();

        Session::flash('success', 'Gallery added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $slug   = make_slug($request->title);
        $gallery   = Gallery::findOrFail($request->gallery_id);
        $galleryId = $request->gallery_id;

        $image       = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg', 'webp');
        $extImage    = pathinfo($image, PATHINFO_EXTENSION);
        $messages = [
            'language_id.required'    => 'The language field is required',
        ];

        $rules = [
            'title'          => [
                'required',
                'max:255',
                function ($attribute, $value, $fail) use ($slug, $galleryId) {
                    $galleries = Gallery::all();
                    foreach ($galleries as $key => $gallery) {
                        if ($gallery->id != $galleryId && strtolower($slug) == strtolower($gallery->slug)) {
                            $fail('The title field must be unique.');
                        }
                    }
                }
            ],
            'category_id'       => 'required',
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

        $gallery               = Gallery::findOrFail($request->gallery_id);
        $gallery->title        = $request->title;
        $gallery->language_id  = $request->language_id;
        $gallery->category_id = $request->category_id;
        $this->saveGallery($request, $gallery);

        if ($request->filled('image')) {
            $filename = ltrim(parse_url($image, PHP_URL_PATH));

            $gallery->image = $filename;
        }

        $gallery->save();

        // Save new FAQs
        // Delete existing FAQs
        //BlogFaq::where('blog_id', $blog->id)->delete();
        //$this->setFAQForBlogs($request, $blog);

        Session::flash('success', 'Gallery updated successfully!');
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

        $gallery = Gallery::findOrFail($request->gallery_id);
        $gallery->delete();
        Session::flash('success', 'Gallery deleted successfully!');
        return back();
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $gallery = Gallery::findOrFail($id);
            @unlink('assets/frontend/images/gallery/' . $gallery->image);

            $this->deleteFromMegaMenu($gallery);

            $gallery->delete();
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
        return GalleryCategory::where('language_id', $langid)
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

    private function saveGallery(Request $request, Gallery $gallery): void
    {
        
        $gallery->serial_number     = 1;
    }
}

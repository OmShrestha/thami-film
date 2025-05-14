<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Session;
use Validator;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $lang_id                 = $lang->id;
        $data['lang_id']         = $lang_id;
        $data['news']            = News::where('language_id', $lang_id)->orderBy('id', 'DESC')->get();
        $data['news_categories'] = NewsCategory::where('language_id', $lang_id)->where('status', 1)->get();

        return view('admin.news.news.index', $data);
    }

    public function edit($id)
    {
        $data['news']            = News::findOrFail($id);
        $data['news_categories'] = NewsCategory::where('language_id', $data['news']->language_id)->where('status', 1)->get();
        return view('admin.news.news.edit', $data);
    }

    public function store(Request $request)
    {
        $image       = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg');
        $extImage    = pathinfo($image, PATHINFO_EXTENSION);

        $messages = [
            'language_id.required' => 'The language field is required'
        ];

        $slug = make_slug($request->title);

        $rules = [
            'language_id'   => 'required',
            'image'         => 'required',
            'title'         => [
                'required',
                'max:255',
                function ($attribute, $value, $fail) use ($slug) {
                    $news = News::all();
                    foreach ($news as $key => $news) {
                        if (strtolower($slug) == strtolower($news->slug)) {
                            $fail('The title field must be unique.');
                        }
                    }
                }
            ],
            'category'      => 'required',
            'content'       => 'required',
            'serial_number' => 'required|integer',
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

        $news                   = new News;
        $news->language_id      = $request->language_id;
        $news->title            = $request->title;
        $news->slug             = $slug;
        $news->bcategory_id     = $request->category;
        $news->content          = str_replace(url('/') . '/assets/frontend/images/', "{base_url}/assets/frontend/images/", $request->content);
        $news->meta_keywords    = $request->meta_keywords;
        $news->meta_description = $request->meta_description;
        $news->serial_number    = $request->serial_number;

        if ($request->filled('image')) {
            $filename = uniqid() . '.' . $extImage;
            @copy($image, 'assets/frontend/images/news/' . $filename);
            $news->main_image = $filename;
        }

        $news->save();

        Session::flash('success', 'News added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $slug   = make_slug($request->title);
        $news   = News::findOrFail($request->news_id);
        $newsId = $request->news_id;

        $image       = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg');
        $extImage    = pathinfo($image, PATHINFO_EXTENSION);

        $rules = [
            'title'         => [
                'required',
                'max:255',
                function ($attribute, $value, $fail) use ($slug, $newsId) {
                    $news = News::all();
                    foreach ($news as $key => $news) {
                        if ($news->id != $newsId && strtolower($slug) == strtolower($news->slug)) {
                            $fail('The title field must be unique.');
                        }
                    }
                }
            ],
            'category'      => 'required',
            'content'       => 'required',
            'serial_number' => 'required|integer',
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

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $news                   = News::findOrFail($request->news_id);
        $news->title            = $request->title;
        $news->slug             = $slug;
        $news->bcategory_id     = $request->category;
        $news->content          = str_replace(url('/') . '/assets/frontend/images/', "{base_url}/assets/frontend/images/", $request->content);
        $news->meta_keywords    = $request->meta_keywords;
        $news->meta_description = $request->meta_description;
        $news->serial_number    = $request->serial_number;

        if ($request->filled('image')) {
            @unlink('assets/frontend/images/news/' . $news->main_image);
            $filename = uniqid() . '.' . $extImage;
            @copy($image, 'assets/frontend/images/news/' . $filename);
            $news->main_image = $filename;
        }

        $news->save();

        Session::flash('success', 'News updated successfully!');
        return "success";
    }

    public function delete(Request $request)
    {

        $news = News::findOrFail($request->news_id);
        @unlink('assets/frontend/images/news/' . $news->main_image);

        $news->delete();

        Session::flash('success', 'News deleted successfully!');
        return back();
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $news = News::findOrFail($id);
            @unlink('assets/frontend/images/news/' . $news->main_image);

            $this->deleteFromMegaMenu($news);

            $news->delete();
        }

        Session::flash('success', 'Newss deleted successfully!');
        return "success";
    }

    public function getcats($langid)
    {
        $bcategories = NewsCategory::where('language_id', $langid)->get();

        return $bcategories;
    }

    public function sidebar(Request $request)
    {
        $news          = News::find($request->news_id);
        $news->sidebar = $request->sidebar;
        $news->save();

        if ($request->sidebar == 1) {
            Session::flash('success', 'Enabled successfully!');
        } else {
            Session::flash('success', 'Disabled successfully!');
        }

        return back();
    }
}

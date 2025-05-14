<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Session;
use Validator;

class NewsCategoryController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $lang_id                 = $lang->id;
        $data['newsCategories'] = NewsCategory::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);

        $data['lang_id'] = $lang_id;

        return view('admin.news.news-category.index', $data);
    }

    public function edit($id)
    {
        $data['news_category'] = NewsCategory::findOrFail($id);
        return view('admin.news.news-category.edit', $data);
    }

    public function store(Request $request)
    {
        $messages = [
            'language_id.required' => 'The language field is required'
        ];

        $rules = [
            'language_id'   => 'required',
            'name'          => 'required|max:255',
            'status'        => 'required',
            'serial_number' => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $newsCategory                = new NewsCategory;
        $newsCategory->language_id   = $request->language_id;
        $newsCategory->name          = $request->name;
        $newsCategory->slug          = slug_create($request->name);
        $newsCategory->status        = $request->status;
        $newsCategory->serial_number = $request->serial_number;
        $newsCategory->save();

        Session::flash('success', 'News category added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $rules = [
            'name'          => 'required|max:255',
            'status'        => 'required',
            'serial_number' => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $newsCategory                = NewsCategory::findOrFail($request->news_category_id);
        $newsCategory->name          = $request->name;
        $newsCategory->slug          = slug_create($request->name);
        $newsCategory->status        = $request->status;
        $newsCategory->serial_number = $request->serial_number;
        $newsCategory->save();

        Session::flash('success', 'News category updated successfully!');
        return "success";
    }

    public function delete(Request $request)
    {

        $newsCategory = NewsCategory::findOrFail($request->news_category_id);
        if ($newsCategory->news()->count() > 0) {
            Session::flash('warning', 'First, delete all the news under this category!');
            return back();
        }

        $newsCategory->delete();

        Session::flash('success', 'News category deleted successfully!');
        return back();
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $newsCategory = NewsCategory::findOrFail($id);
            if ($newsCategory->news()->count() > 0) {
                Session::flash('warning', 'First, delete all the news under the selected categories!');
                return "success";
            }
        }

        foreach ($ids as $id) {
            $newsCategory = NewsCategory::findOrFail($id);
            $this->deleteFromMegaMenu($newsCategory);
            $newsCategory->delete();
        }

        Session::flash('success', 'News categories deleted successfully!');
        return "success";
    }
}

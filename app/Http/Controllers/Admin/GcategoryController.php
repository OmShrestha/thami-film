<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\Language;
use App\Models\Megamenu;
use Illuminate\Http\Request;
use Session;
use Validator;

class GcategoryController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $lang_id            = $lang->id;
        $data['categories'] = GalleryCategory::where('language_id', $lang_id)
            ->orderBy('id', 'DESC')->paginate(30);
        $data['lang_id'] = $lang_id;
        return view('admin.gallery.categories', $data);
    }

    public function store(Request $request)
    {
        $messages = [
            'language_id.required' => 'The language field is required',
        ];

        $rules = [
            'language_id' => 'required',
            'name'        => 'required|max:255|unique:bcategories,name',
            'status'      => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $gcategory                = new GalleryCategory();
        $gcategory->language_id   = $request->language_id;
        $gcategory->name          = $request->name;
        $gcategory->status        = $request->status;
        $gcategory->serial_number = 1;
        $gcategory->save();

        Session::flash('success', 'Gallery category added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $rules = [
            'name'   => 'required|max:255|unique:bcategories,name,' . $request->categoryId,
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $gcategory                = GalleryCategory::findOrFail($request->categoryId);
        $gcategory->name          = $request->name;
        $gcategory->status        = $request->status;
        $gcategory->serial_number = 1;
        $gcategory->save();

        Session::flash('success', 'Blog category updated successfully!');
        return "success";
    }

    public function deleteFromMegaMenu($bcategory)
    {
        $megamenu = Megamenu::where('language_id', $bcategory->language_id)->where('category', 1)->where('type', 'blogs');
        if ($megamenu->count() > 0) {
            $megamenu = $megamenu->first();
            $menus    = json_decode($megamenu->menus, true);
            $catId    = $bcategory->id;
            if (is_array($menus) && array_key_exists("$catId", $menus)) {
                unset($menus["$catId"]);
                $megamenu->menus = json_encode($menus);
                $megamenu->save();
            }
        }
    }

    public function delete(Request $request)
    {

        $bcategory = GalleryCategory::findOrFail($request->bcategory_id);
        if ($bcategory->blogs()->count() > 0) {
            Session::flash('warning', 'First, delete all the blogs under this category!');
            return back();
        }

        $this->deleteFromMegaMenu($bcategory);

        $bcategory->delete();

        Session::flash('success', 'Blog category deleted successfully!');
        return back();
    }

    public function getCategories($langId)
  {
    $gallery_categories = GalleryCategory::where('language_id', $langId)
      ->where('status', 1)
      ->get();

    return $gallery_categories;
  }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $bcategory = GalleryCategory::findOrFail($id);
            if ($bcategory->blogs()->count() > 0) {
                Session::flash('warning', 'First, delete all the blogs under the selected categories!');
                return "success";
            }
        }

        foreach ($ids as $id) {
            $bcategory = GalleryCategory::findOrFail($id);
            $this->deleteFromMegaMenu($bcategory);
            $bcategory->delete();
        }

        Session::flash('success', 'Blog categories deleted successfully!');
        return "success";
    }
}

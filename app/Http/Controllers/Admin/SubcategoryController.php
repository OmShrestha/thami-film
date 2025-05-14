<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bcategory;
use App\Models\Language;
use App\Models\Site;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Session;
use Validator;

class SubcategoryController extends Controller
{

    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $lang_id               = $lang->id;
        $data['subcategories'] = Subcategory::where('language_id', $lang_id)
            ->orderBy('id', 'DESC')->paginate(20);

        $data['bcategories'] = Bcategory::active()
            ->where('language_id', $lang_id)
            ->orderBy('name')->get();

        $data['lang_id'] = $lang_id;

        return view('admin.subcategory.index', $data);
    }

    public function edit($id)
    {
        $data['bcategory'] = Subcategory::findOrFail($id);
        return view('admin.subcategory.index', $data);
    }

    public function store(Request $request)
    {
        $messages = [
            'language_id.required' => 'The language field is required'
        ];

        $rules = [
            'language_id'   => 'required',
            'name'          => 'required|max:255|unique:subcategories',
            'bcategory_id'  => 'required|integer',
            'status'        => 'required',
            'serial_number' => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $subcategory                = new Subcategory;
        $subcategory->language_id   = $request->language_id;
        $subcategory->name          = $request->name;
        $subcategory->slug          = slug_create($request->name);
        $subcategory->bcategory_id  = $request->bcategory_id;
        $subcategory->status        = $request->status;
        $subcategory->serial_number = $request->serial_number;
        $subcategory->save();

        Session::flash('success', 'Subcategory added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $rules = [
            'name'          => 'required|max:255|unique:subcategories,name,' . $request->subcategory_id,
            'status'        => 'required',
            'serial_number' => 'required|integer',
            'bcategory_id'  => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $subcategory                = Subcategory::findOrFail($request->subcategory_id);
        $subcategory->name          = $request->name;
        $subcategory->slug          = slug_create($request->name);
        $subcategory->bcategory_id  = $request->bcategory_id;
        $subcategory->status        = $request->status;
        $subcategory->serial_number = $request->serial_number;
        $subcategory->save();

        Session::flash('success', 'Subcategory updated successfully!');
        return "success";
    }

    public function delete(Request $request)
    {

        $subcategory = Subcategory::findOrFail($request->subcategory_id);
        if ($subcategory->bcategory()->count() > 0) {
            Session::flash('warning', 'First, delete all the category above this subcategory!');
            return back();
        }

        $subcategory->delete();

        Session::flash('success', 'Subcategory deleted successfully!');
        return back();
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $subcategory = Subcategory::findOrFail($id);
            if ($subcategory->bcategory()->count() > 0) {
                Session::flash('warning', 'First, delete all the categories above the selected subcategories!');
                return "success";
            }
        }

        foreach ($ids as $id) {
            $subcategory = Subcategory::findOrFail($id);
            $subcategory->delete();
        }

        Session::flash('success', 'Sub categories deleted successfully!');
        return "success";
    }
}

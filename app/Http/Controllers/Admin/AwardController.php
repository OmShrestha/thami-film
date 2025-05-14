<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Award;
use Illuminate\Http\Request;
use Session;
use Validator;

class AwardController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $lang_id = $lang->id;
        $data['awards'] = Award::where('language_id', $lang_id)->orderBy('id', 'DESC')->get();

        $data['lang_id'] = $lang_id;
        return view('admin.home.award.index', $data);
    }

    public function edit($id)
    {
        $data['award'] = Award::findOrFail($id);
        return view('admin.home.award.edit', $data);
    }


    public function store(Request $request)
    {
        $image = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg');
        $extImage = pathinfo($image, PATHINFO_EXTENSION);

        $messages = [
            'language_id.required' => 'The language field is required'
        ];

        $rules = [
            'language_id' => 'required',
            'image' => 'required',
            'url' => 'required|max:255',
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

        $award = new Award;
        $award->language_id = $request->language_id;
        $award->url = $request->url;
        $award->serial_number = $request->serial_number;

        if ($request->filled('image')) {
            $filename = uniqid() .'.'. $extImage;
            @copy($image, 'assets/frontend/images/awards/' . $filename);
            $award->image = $filename;
        }

        $award->save();

        Session::flash('success', 'Award added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $image = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg');
        $extImage = pathinfo($image, PATHINFO_EXTENSION);

        $rules = [
            'url' => 'required|max:255',
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

        $award = Award::findOrFail($request->award_id);
        $award->url = $request->url;
        $award->serial_number = $request->serial_number;

        if ($request->filled('image')) {
            @unlink('assets/frontend/images/awards/' . $award->image);
            $filename = uniqid() .'.'. $extImage;
            @copy($image, 'assets/frontend/images/awards/' . $filename);
            $award->image = $filename;
        }

        $award->save();

        Session::flash('success', 'Award updated successfully!');
        return "success";
    }

    public function delete(Request $request)
    {

        $award = Award::findOrFail($request->award_id);
        @unlink('assets/frontend/images/awards/' . $award->image);
        $award->delete();

        Session::flash('success', 'Award deleted successfully!');
        return back();
    }
}

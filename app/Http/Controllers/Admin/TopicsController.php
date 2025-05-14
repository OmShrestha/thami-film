<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Site;
use App\Models\Topic;
use Illuminate\Http\Request;
use Session;
use Validator;

class TopicsController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $data['sites'] = Site::where('is_active', 1)->get();

        $lang_id        = $lang->id;
        $data['topics'] = Topic::where('language_id', $lang_id)
            ->where('site_id', session('siteId'))
            ->orderBy('id', 'DESC')->paginate(20);

        $data['lang_id'] = $lang_id;

        return view('admin.topics.index', $data);
    }

    public function edit($id)
    {
        $data['bcategory'] = Topic::findOrFail($id);
        return view('admin.topics.index', $data);
    }

    public function store(Request $request)
    {
        $messages = [
            'language_id.required' => 'The language field is required'
        ];

        $rules = [
            'language_id'   => 'required',
            'site_id'       => 'required',
            'name'          => 'required|max:255',
            'status'        => 'required',
            'serial_number' => 'integer',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $topic                = new Topic;
        $topic->language_id   = $request->language_id;
        $topic->site_id       = session('siteId');
        $topic->name          = $request->name;
        $topic->status        = $request->status;
        $topic->serial_number = $request->serial_number;
        $topic->save();

        Session::flash('success', 'Topic added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $rules = [
            'name'          => 'required|max:255',
            'site_id'       => 'required',
            'status'        => 'required',
            'serial_number' => 'integer',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $topic                = Topic::findOrFail($request->topic_id);
        $topic->name          = $request->name;
        $topic->site_id       = session('siteId');
        $topic->status        = $request->status;
        $topic->serial_number = $request->serial_number;
        $topic->save();

        Session::flash('success', 'Topic updated successfully!');
        return "success";
    }

    public function delete(Request $request)
    {

        $topic = Topic::findOrFail($request->topic_id);

        $topic->delete();

        Session::flash('success', 'Topic deleted successfully!');
        return back();
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $topic = Topic::findOrFail($id);
            $topic->delete();
        }

        Session::flash('success', 'Topics deleted successfully!');
        return "success";
    }
}

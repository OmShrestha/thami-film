<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Tag;
use App\Models\Topic;
use Illuminate\Http\Request;
use Session;
use Validator;

class TagsController extends Controller
{
    public function index(Request $request)
    {
        $data['tags'] = Tag::with('topic')
            ->where('site_id', session('siteId'))
            ->orderBy('id', 'DESC')->paginate(10);

        $data['sites'] = Site::where('is_active', 1)->get();

        $data['topics'] = Topic::active()
            ->where('site_id', session('siteId'))
            ->orderBy('name')->get();

        return view('admin.tags.index', $data);
    }

    public function edit($id)
    {
        $data['tag'] = Tag::findOrFail($id);
        return view('admin.tags.edit', $data);
    }

    public function store(Request $request)
    {
        $messages = [
            'language_id.required' => 'The language field is required'
        ];

        $rules = [
            'language_id' => 'required',
            'site_id'     => 'required',
            'name'        => 'required|max:255|unique:tags',
            'status'      => 'required',
            'topic_id'    => 'required',
            'serial'      => 'integer',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $tag           = new Tag;
        $tag->name     = $request->name;
        $tag->site_id  = session('siteId');
        $tag->status   = $request->status;
        $tag->topic_id = $request->topic_id;
        $tag->serial   = $request->serial;
        $tag->save();

        Session::flash('success', 'Tag added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $rules = [
            'name'     => 'required|max:255|unique:tags,name,' . $request->tag_id,
            'site_id'  => 'required',
            'status'   => 'required',
            'serial'   => 'integer',
            'topic_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $tag           = Tag::findOrFail($request->tag_id);
        $tag->name     = $request->name;
        $tag->site_id  = session('siteId');
        $tag->status   = $request->status;
        $tag->serial   = $request->serial;
        $tag->topic_id = $request->topic_id;
        $tag->save();

        Session::flash('success', 'Tag updated successfully!');
        return "success";
    }

    public function delete(Request $request)
    {

        $tag = Tag::findOrFail($request->tag_id);

        $tag->delete();

        Session::flash('success', 'Tag deleted successfully!');
        return back();
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $tag = Tag::findOrFail($id);
            $tag->delete();
        }

        Session::flash('success', 'Tags deleted successfully!');
        return "success";
    }
}

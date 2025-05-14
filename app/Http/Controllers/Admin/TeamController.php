<?php

namespace App\Http\Controllers\Admin;

use App\Models\BasicExtended;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Language;
use App\Models\BasicSetting as BS;
use Validator;
use Session;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs'] = $lang->basic_setting;
        $data['teams'] = Team::where('language_id', $data['lang_id'])->get();

        return view('admin.home.team.index', $data);
    }

    public function create()
    {
        return view('admin.home.team.create');
    }

    public function edit($id)
    {
        $data['team'] = Team::findOrFail($id);
        return view('admin.home.team.edit', $data);
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
            'name' => 'required|max:150',
            'rank' => 'required|max:150',
            'address' => 'required|max:150',
            'position' => 'required|max:150',
            'facebook' => 'nullable|max:150',
            'twitter' => 'nullable|max:150',
            'linkedin' => 'nullable|max:150',
            'instagram' => 'nullable|max:150',
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

        $team = new Team;
        $team->language_id = $request->language_id;
        $team->image = $request->team_image;
        $team->name = $request->name;
        $team->rank = $request->rank;
        $team->address = $request->address;
        $team->position = $request->position;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->linkedin = $request->linkedin;
        $team->instagram = $request->instagram;

        if ($request->filled('image')) {
            $filename = uniqid() .'.'. $extImage;
            @copy($image, 'assets/frontend/images/teams/' . $filename);
            $team->image = $filename;
        }

        $team->save();

        Session::flash('success', 'Team added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $image = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg');
        $extImage = pathinfo($image, PATHINFO_EXTENSION);

        $rules = [
            'name' => 'required|max:150',
            'rank' => 'required|max:150',
            'address' => 'required|max:150',
            'position' => 'required|max:150',
            'facebook' => 'nullable|max:150',
            'twitter' => 'nullable|max:150',
            'linkedin' => 'nullable|max:150',
            'instagram' => 'nullable|max:150',
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

        $team = Team::findOrFail($request->team_id);
        $team->name = $request->name;
        $team->rank = $request->rank;
        $team->address = $request->address;
        $team->position = $request->position;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->linkedin = $request->linkedin;
        $team->instagram = $request->instagram;

        if ($request->filled('image')) {
            @unlink('assets/frontend/images/teams/' . $team->image);
            $filename = uniqid() .'.'. $extImage;
            @copy($image, 'assets/frontend/images/teams/' . $filename);
            $team->image = $filename;
        }

        $team->save();

        Session::flash('success', 'Team updated successfully!');
        return "success";
    }

    public function textupdate(Request $request, $langid)
    {
        $be = BasicExtended::firstOrFail();
        $version = $bs->theme_version;

        if ($version == 'default' || $version == 'dark') {
            $background = $request->background;
            $allowedExts = array('jpg', 'png', 'jpeg', 'svg');
            $extBackground = pathinfo($background, PATHINFO_EXTENSION);
        }

        $rules = [
            'team_section_title' => 'required|max:25',
            'team_section_subtitle' => 'required|max:80',
        ];

        if (($version == 'default' || $version == 'dark') && $request->filled('background')) {
            $rules['background'] = [
                function ($attribute, $value, $fail) use ($extBackground, $allowedExts) {
                    if (!in_array($extBackground, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg, svg image is allowed");
                    }
                }
            ];
        }

        $request->validate($rules);

        $bs = BS::where('language_id', $langid)->firstOrFail();
        $bs->team_section_title = $request->team_section_title;
        $bs->team_section_subtitle = $request->team_section_subtitle;

        if (($version == 'default' || $version == 'dark') && $request->filled('background')) {
            @unlink('assets/frontend/images/'.$bs->team_bg);
            $filename = uniqid() .'.'. $extBackground;
            @copy($background, 'assets/frontend/images/' . $filename);
            $bs->team_bg = $filename;
        }

        $bs->save();

        Session::flash('success', 'Text & Background updated successfully!');
        return back();
    }

    public function delete(Request $request)
    {

        $team = Team::findOrFail($request->team_id);
        @unlink('assets/frontend/images/members/' . $team->image);
        $team->delete();

        Session::flash('success', 'Team deleted successfully!');
        return back();
    }

    public function feature(Request $request)
    {
        $team = Team::find($request->member_id);
        $team->feature = $request->feature;
        $team->save();

        if ($request->feature == 1) {
            Session::flash('success', 'Featured successfully!');
        } else {
            Session::flash('success', 'Unfeatured successfully!');
        }

        return back();
    }
}

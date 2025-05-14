<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasicSetting;
use Illuminate\Http\Request;

class BasicSettingsUpdateController extends Controller
{
    public function index()
    {
        $settings = BasicSetting::orderBy('id', 'desc')->get()->groupBy('type');

        return view('admin.basic.update-settings',
            compact('settings')
        );
    }

    public function update(Request $request)
    {
        if (!$request->has('settings')) {
            return redirect()->back()->with('error', 'No settings found! Please select a site to manage first!');
        }

        foreach ($request->get('settings') as $id => $settingData) {
            $setting = BasicSetting::find($id);
            if ($setting) {
                $setting->value  = $settingData['value'];
                $setting->type   = $settingData['type'];
                $setting->save();
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}

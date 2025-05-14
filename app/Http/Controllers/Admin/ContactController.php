<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasicExtra;
use App\Models\Language;
use Illuminate\Http\Request;
use Session;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $lang            = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs']     = $lang->basic_setting;
        $data['abex']    = $lang->basic_extra;

        return view('admin.contact', $data);
    }

    public function update(Request $request, $langid)
    {
        $request->validate([
            'contact_form_title'    => 'required|max:255',
            'contact_form_subtitle' => 'required|max:255',
            'contact_addresses'     => 'required',
            'contact_numbers'       => 'required',
            'contact_mails'         => 'required',
            'latitude'              => 'nullable|max:255',
            'longitude'             => 'nullable|max:255',
            'map_zoom'              => 'nullable|max:255',
        ]);

        updateSettingsValue('contact_form_title', $request->contact_form_title);
        updateSettingsValue('contact_form_subtitle', $request->contact_form_subtitle);
        updateSettingsValue('contact_addresses', $request->contact_addresses);
        updateSettingsValue('contact_numbers', $request->contact_numbers);
        updateSettingsValue('contact_mails', $request->contact_mails);
        updateSettingsValue('latitude', $request->latitude);
        updateSettingsValue('longitude', $request->longitude);
        updateSettingsValue('map_zoom', $request->map_zoom ?: 0);

        Session::flash('success', 'Contact page updated successfully!');
        return back();
    }
}

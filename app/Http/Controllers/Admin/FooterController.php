<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicSetting as BS;
use App\Models\Language;
use Validator;
use Session;

class FooterController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs'] = $lang->basic_setting;

        return view('admin.footer.logo-text', $data);
    }


    public function update(Request $request, $langid)
    {
        $footerLogo = $request->footer_logo;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg');
        $extFooterLogo = pathinfo($footerLogo, PATHINFO_EXTENSION);

        $rules = [
            'footer_text' => 'required',
            'newsletter_text' => 'required|max:255',
            'copyright_text' => 'required',
        ];

        if ($request->filled('footer_logo')) {
            $rules['footer_logo'] = [
                function ($attribute, $value, $fail) use ($extFooterLogo, $allowedExts) {
                    if (!in_array($extFooterLogo, $allowedExts)) {
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

        updateSettingsValue('footer_text', $request->footer_text);
        updateSettingsValue('newsletter_text', $request->newsletter_text);
        updateSettingsValue('copyright_text', str_replace(url('/') . '/assets/frontend/images/', "{base_url}/assets/frontend/images/", $request->copyright_text));

        if ($request->filled('footer_logo')) {
            @unlink('assets/frontend/images/' . getSettingsValue('footer_logo'));
            $filename = uniqid() .'.'. $extFooterLogo;
            @copy($footerLogo, 'assets/frontend/images/' . $filename);
            updateSettingsValue('footer_logo', $filename);
        }

        Session::flash('success', 'Footer text updated successfully!');
        return "success";
    }
}

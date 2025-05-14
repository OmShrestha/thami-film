<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Language;

class LanguageController extends Controller
{

    public function change($lang)
    {
        if (!Language::where('code', $lang)->first()) {
            return redirect()->route('frontend.index');
        }
        session()->put('lang', $lang);
        app()->setLocale($lang);
        return redirect()->back();
    }
}

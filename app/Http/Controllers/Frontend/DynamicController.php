<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\BasicSettingsService;

class DynamicController extends Controller
{
    public function __construct(protected BasicSettingsService $bs)
    {
        //
    }

    public function index($slug)
    {
        $data['page'] = Page::where('slug', $slug)->firstOrFail();

        return view('frontend.dynamic', $data);
    }
}

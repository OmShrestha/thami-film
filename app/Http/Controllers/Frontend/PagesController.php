<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\SiteService;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function __construct(private readonly SiteService $site)
    {
    }

    public function about(): View
    {
        $data['featuredServices'] = $this->site->getFeaturedServices();

        if (request()->has('search')) {
            $data['services'] = $this->site->getServicesBySearch(search: request()->search);
        }

        return view('frontend.about', $data);
    }

    public function portfolio(): View
    {
        $data['featuredServices'] = $this->site->getFeaturedServices();

        if (request()->has('search')) {
            $data['services'] = $this->site->getServicesBySearch(search: request()->search);
        }

        return view('frontend.portfolio', $data);
    }
}

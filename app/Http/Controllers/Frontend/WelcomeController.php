<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\SiteService;
use App\Services\BlogService;
use App\Services\SliderService;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function __construct(private readonly SiteService $site, private readonly BlogService $blogService, private readonly SliderService $sliderService)
    {
    }

    /**
     * Show the application welcome index page.
     * @return View
     */
    public function index(): View
    {
        $data = [];
        $data['services'] = $this->site->getFeaturedServices();
        $data['sliders'] = $this->sliderService->getSliders();
        $data['blogs'] = $this->blogService->getLatestBlogs();
      
        if (request()->has('search')) {
            $data['services'] = $this->site->getServicesBySearch(search: request()->search);
        }

        return view('frontend.welcome', $data);
    }
}

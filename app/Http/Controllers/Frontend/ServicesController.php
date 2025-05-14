<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\SiteService;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct(private readonly SiteService $site)
    {
        $this->middleware('increment.views:service,' . request()->route('service') . ', slug')
            ->only('show');
    }

    public function index(Request $request)
    {
        $data = [];

        if ($request->has('search')) {
            $data['services'] = $this->site->getServicesBySearch(search: $request->search);
        }

        $services = [
            'services' => $this->site->getServices(),
        ];

        $data = array_merge(
            $services, $data
        );

        return view('frontend.services.index', $data);
    }

    public function show($category, $service)
    {
        $data['service'] = $this->site->getService(service: $service, category: $category);

        return view('frontend.services.show', $data);
    }

    public function category($category)
    {
        $data['services'] = $this->site->getServicesBySearch(category: $category);
        $data['category'] = $this->site->getCategory($category);

        return view('frontend.services.category', $data);
    }
}

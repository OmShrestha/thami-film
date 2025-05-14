<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\SiteService;
use Illuminate\Http\Request;

class PortfoliosController extends Controller
{
    public function __construct(private readonly SiteService $site)
    {
        $this->middleware('increment.views:portfolio,' . request()->route('portfolio') . ', slug')
            ->only('show');
    }

    public function index(Request $request)
    {
        $data = [];

        if ($request->has('search')) {
            $data['portfolios'] = $this->site->getPortfoliosBySearch(search: $request->search);
        }

        $portfolios = [
            'portfolios' => $this->site->getPortfolios(),
        ];

        $data = array_merge(
            $portfolios, $data
        );

        return view('frontend.portfolios.index', $data);
    }

    public function show($portfolio)
    {
        $data['portfolio'] = $this->site->getPortfolio(portfolio: $portfolio);

        return view('frontend.portfolios.show', $data);
    }
}

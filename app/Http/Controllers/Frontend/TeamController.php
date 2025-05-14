<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\TeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public const VIEW_PATH = 'frontend.';

    public function __construct(private readonly TeamService $site)
    {
        $this->middleware('increment.views:blog,' . request()->route('blog') . ', slug')
            ->only('show');
    }

    public function sachivalaye(Request $request)
    {
        $data['teams'] = $this->site->getTeam();

        return view(self::VIEW_PATH . 'team.kendriasachivalaye', $data);
    }

    public function committe(Request $request)
    {
        $data['teams'] = $this->site->getTeam();

        return view(self::VIEW_PATH . 'team.kendriacommitte', $data);
    }

    public function show($category, $blog)
    {
    }
}

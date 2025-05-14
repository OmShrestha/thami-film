<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Language;

readonly class TeamService
{
    public const PAGE_LIMIT = 120;
    private int $langId;
    private int $pagination;

    public function __construct(
        public Team  $team,
    )
    {
       
        $this->pagination = (request()->routeIs('*teams*') || request()->routeIs('*tag*') || request()->routeIs('*category*'))
            ? 12 : self::PAGE_LIMIT;
    }

    /**
     * Get blog by category and blog slug
     *
     * @param string $category
     * @param string $team
     * @return Team
     */
    public function getTeam()
    {
        if(session()->has('lang')) {
            $this->langId = Language::where('code', session()->get('lang'))->first()->id;
          }else{
              $this->langId = Language::where('is_default', 1)->first()->id;
          }
        return $this->team->orderBy('rank', 'ASC')->where('language_id', $this->langId)->get();
    }
}

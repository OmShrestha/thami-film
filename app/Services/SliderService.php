<?php

namespace App\Services;

use App\Models\Slider;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

readonly class SliderService
{
    public const PAGE_LIMIT = 10;

    public function __construct(
        public Slider   $slider
    )
    {
    }

    /**
     * Get all the services data
     */
    public function getSliders()
    {
        return $this->slider->get();
    }

    private function getSliderQuery(): Builder
    {
        return $this->slider->query();
    }
}

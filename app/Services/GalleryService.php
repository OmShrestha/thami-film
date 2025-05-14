<?php

namespace App\Services;

use App\Models\GalleryCategory;
use App\Models\Gallery;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

readonly class GalleryService
{
    public const PAGE_LIMIT = 120;
    private int $langId;
    private int $pagination;

    public function __construct(
        public Gallery $gallery,
    )
    {
        $this->langId     = getLang()?->id;
        $this->pagination = (request()->routeIs('*gallery*') || request()->routeIs('*category*'))
            ? 12 : self::PAGE_LIMIT;
    }


    /**
     * Get Category by slug
     * @param string $slug
     * @return Gcategory
     */
    

    /**
     * Get blog by category and blog slug
     *
     * @param string $category
     * @param string $blog
     * @return Gallery
     */
    public function getGallery()    
    {
        return $this->gallery->get();
    }

    private function getBlogQuery(): Builder
    {    
        return $this->blog->query()
            ->with(['bcategory:id,slug,name'])
            ->where('language_id', $this->langId)
            ->basic();
    }
}

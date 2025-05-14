<?php

namespace App\Services;

use App\Models\Bcategory;
use App\Models\Blog;
use App\Models\Tag;
use App\Models\Language;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

readonly class BlogService
{
    public const PAGE_LIMIT = 120;
    public int $langId;
    private int $pagination;

    public function __construct(
        public Blog      $blog,
        public Bcategory $category,
        public Tag       $tag
    )
    {
        // if (session()->has('lang')) {
        //     print_r(session()->get('lang'));die('yes');
        // }else{
        //     die('no');
        // }
        // $this->langId     = getLang()?->id;
        $this->pagination = (request()->routeIs('*blogs*') || request()->routeIs('*tag*') || request()->routeIs('*category*'))
            ? 12 : self::PAGE_LIMIT;
    }

    /**
     * Get the latest blogs data
     */
    public function getLatestBlogs(int $limit = 0): Paginator
    {
        if(session()->has('lang')) {
          $this->langId = Language::where('code', session()->get('lang'))->first()->id;
        }else{
            $this->langId = Language::where('is_default', 1)->first()->id;
        }
        return $this->getBlogQuery()->orderByDesc('created_at')->simplePaginate($limit ?: $this->pagination);
    }

    /**
     * Get the popular blogs data
     */
    public function getPopularBlogs(int $limit = 0): Paginator
    {
        return $this->getBlogQuery()->orderByDesc('views_count')->simplePaginate($limit ?: $this->pagination);
    }

    /**
     * Get the breaking news data
     */
    public function getBreakingNews(int $limit = 0): Paginator
    {
        return $this->getBlogQuery()->where('breaking_news', 1)->orderByDesc('created_at')->simplePaginate($limit ?: $this->pagination);
    }

    /**
     * Get blogs with category and tags, when category, tag or search is provided
     *
     * @param string|null $category
     * @param string|null $tag
     * @param string|null $search
     */
    public function getBlogsBySearch(string $category = null, string $tag = null, string $search = null): Paginator
    {
        $query = $this->getBlogQuery();

        $query->when($category, fn($query, $category) => $query->whereHas('bcategory', function ($query) use ($category) {
            $query->where('slug', $category);
        }))
            ->when($tag, fn($query, $tag) => $query->whereHas('tags', function ($query) use ($tag) {
                $query->where('slug', $tag);
            }))
            ->when($search, fn($query, $search) => $query->search($search));

        return $query->latest()->simplePaginate($this->pagination);
    }

    /**
     * Get Category by slug
     * @param string $slug
     * @return Bcategory
     */
    public function getCategory(string $slug): Bcategory
    {
        return $this->category->query()
            ->where('slug', $slug)
            ->firstOrFail(['name', 'views_count', 'slug']);
    }

    /**
     * Get Tag by slug
     * @param string $slug
     * @return Tag
     */
    public function getTag(string $slug): Tag
    {
        return $this->tag->query()
            ->where('slug', $slug)
            ->firstOrFail(['name', 'views_count', 'slug']);
    }

    /**
     * Get blog by category and blog slug
     *
     * @param string $category
     * @param string $blog
     * @return Blog
     */
    public function getBlog(string $blog): Blog
    {
        
        return $this->blog->query()
            ->where('slug', $blog)
            ->firstOrFail();
    }

    private function getBlogQuery(): Builder
    {

        return $this->blog->query()
            ->with(['bcategory:id,slug,name'])
            ->where('status','1')
            ->where('language_id', $this->langId)
            ->basic();
    }
}

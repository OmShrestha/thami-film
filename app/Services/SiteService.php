<?php

namespace App\Services;

use App\Models\Portfolio;
use App\Models\Scategory;
use App\Models\Service;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

readonly class SiteService
{
    public const PAGE_LIMIT = 10;

    public function __construct(
        public Service   $service,
        public Portfolio $portfolio,
        public Scategory $category,
    )
    {
    }

    /**
     * Get all the services data
     */
    public function getServices(): Paginator
    {
        return $this->getServiceQuery()->latest()->simplePaginate(self::PAGE_LIMIT);
    }

    /**
     * Get the featured services data
     */
    public function getFeaturedServices(): Paginator
    {
        return $this->getServiceQuery()->where('feature', 1)->orderByDesc('created_at')
            ->simplePaginate(self::PAGE_LIMIT);
    }

    /**
     * Get all the portfolios data
     */
    public function getPortfolios(): Paginator
    {
        return $this->getPortfolioQuery()->latest()->simplePaginate(self::PAGE_LIMIT);
    }

    /**
     * Get services with category, when category or search is provided
     *
     * @param string|null $category
     * @param string|null $search
     */
    public function getServicesBySearch(string $category = null, string $search = null): Paginator
    {
        $query = $this->getServiceQuery();

        $query->when($category, fn($query, $category) => $query->whereHas('scategory', function ($query) use ($category) {
            $query->where('slug', $category);
        }))
            ->when($search, fn($query, $search) => $query->search($search));

        return $query->latest()->simplePaginate(self::PAGE_LIMIT);
    }

    /**
     * Get portfolios when search is provided
     * @param string|null $search
     */
    public function getPortfoliosBySearch(string $search = null): Paginator
    {
        $query = $this->getPortfolioQuery();
        $query->when($search, fn($query, $search) => $query->search($search));

        return $query->latest()->simplePaginate(self::PAGE_LIMIT);
    }

    /**
     * Get Category by slug
     * @param string $slug
     * @return Scategory
     */
    public function getCategory(string $slug): Scategory
    {
        return $this->category->query()
            ->where('slug', $slug)
            ->firstOrFail(['name', 'views_count', 'slug']);
    }

    /**
     * Get course by category and course slug
     *
     * @param string $service
     * @param string $category
     * @return Model|Builder
     */
    public function getService(string $service, string $category): Builder|Model
    {
        return $this->getServiceQuery()
            ->where('slug', $service)
            ->firstOrFail();
    }

    /**
     * Get course by category and course slug
     *
     * @param string $portfolio
     * @return Model|Builder
     */
    public function getPortfolio(string $portfolio): Builder|Model
    {
        return $this->getPortfolioQuery()
            ->where('slug', $portfolio)
            ->firstOrFail();
    }

    private function getServiceQuery(): Builder
    {
        return $this->service->query()->with('scategory');
    }

    private function getPortfolioQuery(): Builder
    {
        return $this->portfolio->query();
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Blog extends Model
{
    public $timestamps = true;

    public function bcategory(): BelongsTo
    {
        return $this->belongsTo(Bcategory::class, 'bcategory_id');
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo('App\Models\Language');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'blog_tags');
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(BlogFaq::class);
    }

    public function section(): MorphOne
    {
        return $this->morphOne(Section::class, 'sectionable');
    }

    /**
     * Get the site that owns the blog.
     */
    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class, 'site_id');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Scope a query to search blog by title or content.
     *
     * @param  $query
     * @param string $search
     * @return Builder
     */
    public function scopeSearch($query, string $search): Builder
    {
        return $query->where('title', 'like', '%' . $search . '%');
    }

    /**
     * Scope a query to only include specific columns.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeBasic(Builder $query): Builder
    {
        return $query->select('slug', 'title', 'main_image', 'content', 'views_count', 'bcategory_id', 'excerpt', 'breaking_news',
                'meta_keywords', 'meta_description', 'alt_text', 'image_description', 'created_at', 'updated_at'
            );
    }

    /**
     * Scope a query to only include breaking news blogs.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeBreakingNews(Builder $query): Builder
    {
        return $query->where('breaking_news', 1);
    }

    /**
     * Scope popular blogs.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopePopular(Builder $query): Builder
    {
        return $query->orderByDesc('views_count');
    }

    /**
     * Get the next post.
     * @throws BindingResolutionException
     */
    public function next(): mixed
    {
        // Attempt to get the next post by creation date and ID
        return $this->with('bcategory')
            ->where('created_at', '>', $this->created_at)
            ->orderBy('created_at')
            ->first();
    }

    /**
     * Get the previous post.
     * @throws BindingResolutionException
     */
    public function previous(): mixed
    {
        // Attempt to get the previous post by creation date and ID
        return $this->with('bcategory')
            ->where('created_at', '<', $this->created_at)
            ->orWhere(function ($query) {
                $query->where('id', '<', $this->id);
            })
            ->orderBy('created_at', 'desc')
            ->first();
    }
}

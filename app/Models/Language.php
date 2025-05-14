<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    protected $fillable = ['id', 'name', 'is_default', 'code', 'rtl'];

    public function basic_setting(): HasMany
    {
        return $this->hasMany('App\Models\BasicSetting');
    }

    public function sliders(): HasMany
    {
        return $this->hasMany('App\Models\Slider');
    }

    public function features(): HasMany
    {
        return $this->hasMany('App\Models\Feature');
    }

    public function statistics(): HasMany
    {
        return $this->hasMany('App\Models\Statistic');
    }

    public function testimonials(): HasMany
    {
        return $this->hasMany('App\Models\Testimonial');
    }

    public function members(): HasMany
    {
        return $this->hasMany('App\Models\Member');
    }

    public function partners(): HasMany
    {
        return $this->hasMany('App\Models\Partner');
    }

    public function ulinks(): HasMany
    {
        return $this->hasMany('App\Models\Ulink');
    }

    public function pages(): HasMany
    {
        return $this->hasMany('App\Models\Page');
    }

    public function scategories(): HasMany
    {
        return $this->hasMany('App\Models\Scategory');
    }

    public function services(): HasMany
    {
        return $this->hasMany('App\Models\Service');
    }

    public function portfolios(): HasMany
    {
        return $this->hasMany('App\Models\Portfolio');
    }

    public function bcategories(): HasMany
    {
        return $this->hasMany('App\Models\Bcategory');
    }

    public function blogs(): HasMany
    {
        return $this->hasMany('App\Models\Blog');
    }

    public function news(): HasMany
    {
        return $this->hasMany('App\Models\News');
    }

    public function jcategories(): HasMany
    {
        return $this->hasMany('App\Models\Jcategory');
    }

    public function jobs(): HasMany
    {
        return $this->hasMany('App\Models\Job');
    }

    public function menus(): HasMany
    {
        return $this->hasMany('App\Models\Menu');
    }

    public function sitemaps(): HasMany
    {
        return $this->hasMany('App\Models\Sitemap');
    }

    public function articleCategories(): HasMany
    {
        return $this->hasMany('App\Models\ArticleCategory');
    }

    public function articles(): HasMany
    {
        return $this->hasMany('App\Models\Article');
    }

    public function megamenus(): HasMany
    {
        return $this->hasMany('App\Models\Megamenu');
    }

    public function popups(): HasMany
    {
        return $this->hasMany('App\Models\Popup');
    }

    public function faqs(): HasMany
    {
        return $this->hasMany('App\Models\Faq');
    }

    public function faqCategory(): HasMany
    {
        return $this->hasMany('App\Models\FAQCategory');
    }

    public function galleries(): HasMany
    {
        return $this->hasMany('App\Models\Gallery');
    }

    public function galleryCategory(): HasMany
    {
        return $this->hasMany('App\Models\GalleryCategory');
    }
}

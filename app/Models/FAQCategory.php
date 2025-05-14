<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FAQCategory extends Model
{
    protected $table = 'faq_categories';

    protected $fillable = [
        'language_id',
        'name',
        'status',
        'serial_number'
    ];

    public function faqCategoryLang()
    {
        return $this->belongsTo('App\Models\Language');
    }

    public function frequentlyAskedQuestion()
    {
        return $this->hasMany('App\Models\Faq', 'category_id', 'id');
    }

    /**
     * Get the site that owns the blog.
     */
    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
}

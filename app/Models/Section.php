<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Section extends Model
{
    protected $fillable = [
        'name',
        'items_to_display',
        'order',
        'active',
        'item_count',
        'data',
        'design_type',
        'sectionable_id',
        'sectionable_type',
    ];

    protected $casts = [
        'settings' => 'array',
    ];

    public function sectionable(): MorphTo
    {
        return $this->morphTo();
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Get the site that owns the blog.
     */
    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class, 'site_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subcategory extends Model
{
    protected $fillable = [
        'language_id',
        'site_id',
        'name',
        'slug',
        'bcategory_id',
        'status',
        'serial_number',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function bcategory(): BelongsTo
    {
        return $this->belongsTo(Bcategory::class, 'bcategory_id');
    }

    /**
     * Get the site that owns the blog.
     */
    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
}

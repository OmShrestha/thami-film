<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogFaq extends Model
{
    protected $table = 'blog_faqs';

    protected $fillable = [
        'site_id',
        'blog_id',
        'question',
        'answer',
        'status',
        'serial'
    ];

    public $timestamps = true;

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}

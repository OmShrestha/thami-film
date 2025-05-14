<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Faq extends Model
{
  public $timestamps = false;

  public function faqCategory(): BelongsTo
  {
    return $this->belongsTo('App\Models\FAQCategory', 'category_id', 'id');
  }

    /**
     * Get the site that owns the blog.
     */
    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class, 'site_id');
    }
}

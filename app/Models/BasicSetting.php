<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BasicSetting extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'language_id',
        'name',
        'value',
        'type',
        'active',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}

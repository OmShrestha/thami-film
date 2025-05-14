<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model
{

    protected $fillable = [
        'name',
        'identifier',
        'description',
        'is_active',
        'created_by',
    ];

    public function created_by(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}

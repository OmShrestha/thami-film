<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'publications';

    protected $fillable = [
        'title',
        'excerpt',
        'description',
        'filename',
        'path',
        'image',
        'is_published',
        'pubished_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function pdf()
    {
        return $this->hasMany('App\Model\NewsletterPdf');
    }
}

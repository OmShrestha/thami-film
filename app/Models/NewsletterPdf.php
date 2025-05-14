<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsletterPdf extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'newsletter_pdf';

    protected $guarded = [];

    public function publication()
    {
        return $this->belongsTo('App\Models\Model\Publication');
    }
}

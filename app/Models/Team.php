<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'rank', 'image', 'address','position', 'facebook', 'twitter',''];

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}

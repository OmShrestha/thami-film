<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  public function language()
  {
    return $this->belongsTo('App\Models\Language');
  }

  public function galleryImgCategory()
  {
    return $this->belongsTo('App\GalleryCategory', 'category_id', 'id');
  }
}

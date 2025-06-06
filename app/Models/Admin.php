<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'role_id', 'username', 'email', 'password', 'first_name', 'last_name', 'image', 'status'
  ];


  public function role(): BelongsTo
  {
    return $this->belongsTo('App\Models\Role');
  }

  public function site(): HasOne
  {
        return $this->hasOne(Site::class, 'id', 'current_site_id');
    }
}

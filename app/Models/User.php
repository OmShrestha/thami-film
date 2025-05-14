<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'full_name',
        'email',
        'photo',
        'username',
        'password',
        'number',
        'city',
        'state',
        'address',
        'country',
        'billing_fname',
        'billing_lname',
        'billing_email',
        'billing_photo',
        'billing_number',
        'billing_city',
        'billing_state',
        'billing_address',
        'billing_country',
        'shpping_fname',
        'shpping_lname',
        'shpping_email',
        'shpping_photo',
        'shpping_number',
        'shpping_city',
        'shpping_state',
        'shpping_address',
        'shpping_country',
        'status',
        'verification_link',
        'email_verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courseOrder(): HasMany
    {
        return $this->hasMany('App\Models\CoursePurchase');
    }

    public function course_reviews(): HasMany
    {
        return $this->hasMany('App\Models\CourseReview');
    }

    public function batches(): HasMany
    {
        return $this->hasMany(CourseBatchUser::class);
    }
}

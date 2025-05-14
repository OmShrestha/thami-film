<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;

    protected $table = 'donors';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'amount',
        'stripe_token',
        'customer_id',
    ];
}

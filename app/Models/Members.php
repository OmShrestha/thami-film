<?php

namespace App\Models;

use App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'city',
        'phone',
        'state',
        'password',
        'customer_id',
        'stripe_token',
    ];
    public function payment()
    {
        return $this->hasMany(Payment::class, 'member_id', 'id');
    }
}

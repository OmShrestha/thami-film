<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentLog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'course_purchase_id',
        'user_id',
        'amount',
        'status',
        'payment_gateway',
        'currency',
        'transaction_id',
    ];

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(CoursePurchase::class, 'course_purchase_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

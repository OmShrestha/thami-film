<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfflineGateway extends Model
{
    protected $fillable = ['id', 'language_id', 'name', 'short_description', 'instructions', 'serial_number', 'status', 'is_receipt', 'receipt'];

    public function offline_gateway(): BelongsTo
    {
        return $this->belongsTo('App\Models\PaymentGateway');
    }
}

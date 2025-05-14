<?php

namespace App\Models;

use App\Models\Members;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'amount',
        'token',
        'type',
    ];
    public function member()
    {
        return $this->belongsTo(Members::class, 'member_id', 'id');
    }
}

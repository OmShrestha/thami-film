<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'referrer',
        'message',
        'ip'
    ];

    public static function store($data)
    {
        return self::create($data);
    }
}

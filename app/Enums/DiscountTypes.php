<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class DiscountTypes extends Enum
{
    const Fixed      = 'fixed';
    const Percentage = 'percentage';
}

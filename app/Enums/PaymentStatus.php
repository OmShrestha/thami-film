<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

final class PaymentStatus extends Enum
{
    const PARTIAL  = 'partial';
    const COMPLETE = 'complete';
    const NONE     = 'none';
}

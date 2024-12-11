<?php

declare(strict_types=1);

namespace App\Enum;

enum InstallmentTypeEnum: string
{
    case MONTHLY = 'monthly';
    case UPFRONT = 'upfront';
}

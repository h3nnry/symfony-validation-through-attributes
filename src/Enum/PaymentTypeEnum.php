<?php

declare(strict_types=1);

namespace App\Enum;

enum PaymentTypeEnum: string
{
    case BANK_TRANSFER = 'bankTransfer';
    case DIRECT_DEBIT = 'directDebit';
}

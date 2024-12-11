<?php

declare(strict_types=1);

namespace App\Enum;

enum InvoicingPlanStatusTypeEnum: string
{
    case OPEN = 'open';
    case DRAFT = 'draft';
    case INACTIVE = 'inactive';
    case CLOSED = 'closed';
}

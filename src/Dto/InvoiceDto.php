<?php

declare(strict_types=1);

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final readonly class InvoiceDto
{
    public function __construct(
        #[Assert\Uuid(strict: true)]
        public string $uuid,
        #[Assert\Sequentially([
            new Assert\NotNull(message: 'Name should not be null.'),
            new Assert\Type('string', message: 'Name should be string.'),
            new Assert\Length(max: 100, maxMessage: 'Name should have maximum 100 characters.'),
        ])]
        public string $name,
        #[Assert\Regex(pattern: '/^\d+(.\d+)?$/', message: 'Price is invalid.')]
        public string $price,
        #[Assert\Regex(pattern: '/^\d+(.\d+)?$/', message: 'Discount is invalid.')]
        public string $discount = '0',
        #[Assert\Date(message: 'StartDate is invalid.')]
        public ?string $startDate = null,
        #[Assert\Date(message: 'EndDate is invalid.')]
        public ?string $endDate = null,
    ) {
    }
}

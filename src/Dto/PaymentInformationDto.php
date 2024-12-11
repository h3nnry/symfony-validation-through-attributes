<?php

declare(strict_types=1);

namespace App\Dto;

use App\Enum\InstallmentTypeEnum;
use App\Enum\PaymentTypeEnum;
use Symfony\Component\Validator\Constraints as Assert;

final readonly class PaymentInformationDto
{
    public function __construct(
        #[Assert\Type(type: 'integer', message: 'CustomerNumber should be integer.')]
        public int $customerNumber,
        #[Assert\Choice(callback: 'getValidPaymentTypes', message: 'PaymentType is invalid.')]
        public string $paymentType,
        #[Assert\Choice(callback: 'getValidInstallmentTypes', message: 'InstallmentType is invalid.')]
        public ?string $installmentType = null,
        #[Assert\Sequentially([
            new Assert\NotNull(message: 'BankAccountOwner should not be null.'),
            new Assert\Type('string', message: 'BankAccountOwner should be string.'),
            new Assert\Length(max: 100, maxMessage: 'BankAccountOwner should have maximum 100 characters.'),
        ])]
        public ?string $bankAccountOwner = null,
        #[Assert\Type(type: 'string', message: 'Iban should be string.')]
        public ?string $encryptedIban = null,
        #[Assert\Date(message: 'SepaMandateExpirationDate is invalid.')]
        public ?string $sepaMandateExpirationDate = null,
    ) {
    }

    /**
     * @return string[]
     */
    public static function getValidPaymentTypes(): array
    {
        return array_column(PaymentTypeEnum::cases(), 'value');
    }

    /**
     * @return array<int, string|null>
     */
    public static function getValidInstallmentTypes(): array
    {
        return array_column(InstallmentTypeEnum::cases(), 'value') + [null];
    }
}
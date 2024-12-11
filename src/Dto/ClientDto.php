<?php

declare(strict_types=1);

namespace App\Dto;

use App\Enum\InstallmentTypeEnum;
use Symfony\Component\Validator\Constraints as Assert;

final readonly class ClientDto
{
    public function __construct(
        #[Assert\Type(type: 'integer', message: 'CustomerNumber should be integer.')]
        public int $customerNumber,
        #[Assert\Sequentially([
            new Assert\NotNull(message: 'CompanyName should not be null.'),
            new Assert\Type('string', message: 'CompanyName should be string.'),
            new Assert\Length(max: 100, maxMessage: 'CompanyName should have maximum 100 characters.'),
        ])]
        public string $companyName,
        #[Assert\Sequentially([
            new Assert\NotNull(message: 'StreetAndHouseNumber should not be null.'),
            new Assert\Type('string', message: 'StreetAndHouseNumber should be string.'),
            new Assert\Length(max: 50, maxMessage: 'StreetAndHouseNumber should have maximum 50 characters.'),
            new Assert\Choice(callback: 'getValidInstallmentTypes', message: 'InstallmentType is invalid.'),
        ])]
        public string $streetAndHouseNumber,
        #[Assert\Sequentially([
            new Assert\NotNull(message: 'City should not be null.'),
            new Assert\Type('string', message: 'City should be string.'),
            new Assert\Length(max: 100, maxMessage: 'City should have maximum 100 characters.'),
        ])]
        public string $city,
        #[Assert\Sequentially([
            new Assert\NotNull(message: 'ZipCode should not be null.'),
            new Assert\Type('string', message: 'ZipCode should be string.'),
            new Assert\Length(max: 10, maxMessage: 'ZipCode should have maximum 10 characters.'),
        ])]
        public string $zipCode,
        #[Assert\Sequentially([
            new Assert\NotNull(message: 'ShortName should not be null.'),
            new Assert\Type('string', message: 'ShortName should be string.'),
            new Assert\Length(max: 50, maxMessage: 'ShortName should have maximum 50 characters.'),
        ])]
        public string $shortName,
        #[Assert\Sequentially([
            new Assert\NotNull(message: 'FullName should not be null.'),
            new Assert\Type('string', message: 'FullName should be string.'),
            new Assert\Length(max: 100, maxMessage: 'FullName should have maximum 100 characters.'),
        ])]
        public string $fullName,
        #[Assert\Sequentially([
            new Assert\Email(message: 'Email is invalid.'),
            new Assert\Type('string', message: 'Email should be string.'),
            new Assert\Length(max: 100, maxMessage: 'Email should have maximum 100 characters.'),
        ])]
        public string $email,
        #[Assert\Sequentially([
            new Assert\Type('string', message: 'Vatin should be string.'),
            new Assert\Length(max: 20, maxMessage: 'Vatin should have maximum 20 characters.'),
        ])]
        public ?string $vatin,
        #[Assert\Country(message: 'CountryCode is invalid.')]
        public string $countryCode,
    ) {
    }

    public static function getValidInstallmentTypes(): array
    {
        return array_column(InstallmentTypeEnum::cases(), 'value');
    }
}

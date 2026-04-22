<?php

namespace App\Http\Integrations\DiamondSeven\DataTransferObjects;

class TaxCode
{
    public function __construct(
        public readonly int $taxCodeId,
        public readonly string $name,
        public readonly int $taxClass,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            taxCodeId: $data['TaxCodeId'],
            name: $data['Name'],
            taxClass: $data['TaxClass'],
        );
    }
}

<?php

namespace App\Http\Integrations\DiamondSeven\DataTransferObjects;

class Branch
{
    public function __construct(
        public readonly int $branchId,
        public readonly int $quantity,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            branchId: $data['BranchId'],
            quantity: $data['Quantity'],
        );
    }
}

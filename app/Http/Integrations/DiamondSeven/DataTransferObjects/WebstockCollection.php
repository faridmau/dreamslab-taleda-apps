<?php

namespace App\Http\Integrations\DiamondSeven\DataTransferObjects;

use Countable;

class WebstockCollection implements Countable
{
    /**
     * @param  WebstockItem[]  $items
     */
    public function __construct(
        public readonly array $items,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            items: array_map(fn (array $item) => WebstockItem::fromArray($item), $data),
        );
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function inStock(): self
    {
        return new self(
            items: array_values(array_filter($this->items, fn (WebstockItem $item) => $item->isInStock())),
        );
    }

    public function outOfStock(): self
    {
        return new self(
            items: array_values(array_filter($this->items, fn (WebstockItem $item) => ! $item->isInStock())),
        );
    }

    /** @return WebstockItem[] */
    public function all(): array
    {
        return $this->items;
    }
}

<?php

declare(strict_types=1);

namespace Tests\Fixtures\LaravelData;

use Spatie\LaravelData\Data;

final class ManualRules extends Data
{
    public function __construct(
        public string $name,
        public string $description,
        public float $price,
        public array $items,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
            'price' => ['required', 'numeric', 'min:0', 'max:9999.99'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'integer', 'exists:products,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1', 'max:10'],
        ];
    }
}

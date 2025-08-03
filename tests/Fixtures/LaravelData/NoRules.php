<?php

declare(strict_types=1);

namespace Tests\Fixtures\LaravelData;

use Tests\Fixtures\Enums\ExampleEnum;

final class NoRules
{
    public function __construct(
        public string $firstName,
        public ?string $lastName,
        public int $age,
        public float $price,
        public array $items,
        public ExampleEnum $enum,
    ) {
    }
}

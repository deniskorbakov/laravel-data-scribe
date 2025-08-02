<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Rules;

use Spatie\LaravelData\Data;

final readonly class ValidationRules
{
    /** @param class-string<Data> $className */
    public function __construct(
        public string $className,
    ) {
    }

    public function rules(): array
    {
        return $this->className::getValidationRules([]);
    }
}

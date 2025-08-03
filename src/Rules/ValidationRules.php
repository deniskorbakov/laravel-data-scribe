<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Rules;

use DenisKorbakov\LaravelDataScribe\Resolvers\ParentClassResolver;
use Spatie\LaravelData\Data;

/** Provides validation rules for a Laravel Data class */
final readonly class ValidationRules
{
    /** @param class-string<Data> $className */
    public function __construct(
        public string $className,
    ) {
    }

    /** @return array<string, array<int, mixed>> Validation rules from the Data class */
    public function rules(): array
    {
        /** @var array<string, array<int, mixed>> */
        return (new ParentClassResolver($this->className))
            ->isInstanceOf(Data::class) ? $this->className::getValidationRules([]) : [];
    }
}

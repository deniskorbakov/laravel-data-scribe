<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Extractors\Attributes;

use ReflectionAttribute;

/** Extracts Body Param attribute from method attributes */
final readonly class BodyParamAttributeExtract implements AttributeExtract
{
    /** @param ReflectionAttribute[] $attributes Method to analyze */
    public function __construct(
        public array $attributes,
    ) {
    }

    /** @return array<string, string> Get array arguments or empty array */
    public function extract(): array
    {
        return ['test' => 'test'];
    }
}

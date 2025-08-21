<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Extractors\Attributes;

use Knuckles\Scribe\Attributes\BodyParam;
use ReflectionAttribute;

/** Extracts Body Param attribute from method attributes */
final readonly class BodyParamAttributeExtract implements AttributeExtract
{
    /** @param ReflectionAttribute[] $attributes Method to analyze */
    public function __construct(
        public array $attributes,
    ) {
    }

    /** @return array<int, array<string, mixed>>  Get array arguments or empty array */
    public function extract(): array
    {
        $arguments = [];

        foreach ($this->attributes as $attribute) {
            if ($attribute instanceof ReflectionAttribute) {
                if(is_a($attribute->getName(), BodyParam::class, true)) {
                    $arguments[] = $attribute->getArguments();
                }
            }
        }

        return $arguments;
    }
}

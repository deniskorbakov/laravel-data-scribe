<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Extractors\Classes;

use DenisKorbakov\LaravelDataScribe\Resolvers\ParentClassResolver;
use ReflectionNamedType;
use ReflectionParameter;
use Spatie\LaravelData\Data;

/** Extracts Laravel Data class from method parameters */
final readonly class LaravelDataClassExtract implements ClassExtract
{
    /** @param ReflectionParameter[] $parameters Method to analyze */
    public function __construct(
        public array $parameters,
    ) {
    }

    /** @return string Found Data class name or empty string */
    public function extract(): string
    {
        foreach ($this->parameters as $argument) {
            $type = $argument->getType();

            if (!$type instanceof ReflectionNamedType) {
                continue;
            }

            $nameArgument = $type->getName();

            if (! class_exists($nameArgument)) {
                continue;
            }

            $parentResolver = new ParentClassResolver($nameArgument);

            if ($parentResolver->isInstanceOf(Data::class)) {
                return $nameArgument;
            }
        }

        return '';
    }
}

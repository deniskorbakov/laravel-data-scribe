<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Extractors;

use DenisKorbakov\LaravelDataScribe\Resolvers\ParentClassResolver;
use ReflectionFunctionAbstract;
use Spatie\LaravelData\Data;

/** Extracts Laravel Data class from method parameters */
final readonly class LaravelDataExtractor
{
    /** @param ReflectionFunctionAbstract|null $method Method to analyze */
    public function __construct(
        public ?ReflectionFunctionAbstract $method,
    ) {
    }

    /** @return class-string<Data> Found Data class name or empty string */
    public function fromParameters(): string
    {
        foreach ($this->method->getParameters() as $argument) {
            $nameArgument = $argument->getType()->getName();

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

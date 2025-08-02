<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Extractors;

use DenisKorbakov\LaravelDataScribe\Resolvers\ParentClassResolver;
use ReflectionFunctionAbstract;
use Spatie\LaravelData\Data;

final readonly class DataClassExtractor
{
    public function __construct(
        public ?ReflectionFunctionAbstract $method,
    ){
    }

    /** @return class-string<Data> */
    public function fromParameters(): string
    {
        foreach ($this->method->getParameters() as $argument) {
            $nameClassArgument = $argument->getType()->getName();

            $parentResolver = new ParentClassResolver($nameClassArgument);

            if ($parentResolver->isInstanceOf(Data::class)) {
                return $nameClassArgument;
            }
        }

        return '';
    }
}

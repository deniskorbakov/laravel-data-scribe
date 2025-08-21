<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Transforms\BodyParam;

use Knuckles\Scribe\Attributes\BodyParam;

final readonly class AtrTBodyParamTransform implements BodyParamTransform
{
    /** @param array<int, array<string, mixed>> $attributeArguments */
    public function __construct(
        public array $attributeArguments,
    ) {}

    /** @return array<string, array<string, mixed>> */
    public function transform(): array
    {
        $argumentsDoc = [];

        foreach ($this->attributeArguments as $arguments) {
            $bodyParam = new BodyParam(...$arguments);

            $argumentsDoc[$bodyParam->name] = $bodyParam->toArray();
        }

        return $argumentsDoc;
    }
}

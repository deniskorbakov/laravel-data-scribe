<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Transforms\BodyParam;

use Knuckles\Scribe\Attributes\BodyParam;
use TypeError;

final readonly class AtrToBodyParamTransform implements BodyParamTransform
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
            try {
                $bodyParam = new BodyParam(...$arguments);

                $argumentsDoc[$bodyParam->name] = $bodyParam->toArray();
            } catch (TypeError) {
                continue;
            }
        }

        return $argumentsDoc;
    }
}

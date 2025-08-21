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
    ) {
    }

    /** @return array<string, array<string, mixed>> */
    public function transform(): array
    {
        $argumentsDoc = [];

        foreach ($this->attributeArguments as $arguments) {
            try {
                /** @phpstan-ignore-next-line */
                $bodyParam = new BodyParam(...$arguments);

                /** @var array<string, mixed> $dataDoc */
                $dataDoc = $bodyParam->toArray();

                $argumentsDoc[$bodyParam->name] = $dataDoc;
            } catch (TypeError) {
                continue;
            }
        }

        return $argumentsDoc;
    }
}

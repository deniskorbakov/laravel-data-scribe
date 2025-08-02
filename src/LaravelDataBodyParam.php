<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe;

use DenisKorbakov\LaravelDataScribe\Params\BodyParams;
use DenisKorbakov\LaravelDataScribe\Resolvers\ParentClassResolver;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Extracting\ParsesValidationRules;
use Knuckles\Scribe\Extracting\Strategies\Strategy;
use Spatie\LaravelData\Data;

final class LaravelDataBodyParam extends Strategy
{
    use ParsesValidationRules;

    public function __invoke(ExtractedEndpointData $endpointData, array $settings = []): ?array
    {
        foreach ($endpointData->method->getParameters() as $argument) {
            $nameClassArgument = $argument->getType()->getName();

            $parentResolver = new ParentClassResolver($nameClassArgument);

            if ($parentResolver->isInstanceOf(Data::class)) {
                return (new BodyParams($nameClassArgument, $this->config))->generate();
            }
        }

        return [];
    }
}

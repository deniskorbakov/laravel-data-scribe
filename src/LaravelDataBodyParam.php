<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe;

use DenisKorbakov\LaravelDataScribe\Extractors\ParametersExtractor;
use DenisKorbakov\LaravelDataScribe\Params\BodyParams;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Extracting\ParsesValidationRules;
use Knuckles\Scribe\Extracting\Strategies\Strategy;
use ReflectionParameter;
use Spatie\LaravelData\Data;

/** Generates Laravel Data request body parameters from endpoint data */
final class LaravelDataBodyParam extends Strategy
{
    use ParsesValidationRules;

    /**
     * @param ExtractedEndpointData $endpointData Endpoint method and parameters
     * @param array<string, mixed> $settings
     * @return ?array<string, mixed> Generated body params or null
     */
    public function __invoke(ExtractedEndpointData $endpointData, array $settings = []): ?array
    {
        /** @var ReflectionParameter[] $parameters */
        $parameters = $endpointData->method?->getParameters();

        /** @var class-string<Data> $laravelDataClass */
        $laravelDataClass = (new ParametersExtractor($parameters))->extract();

        if (empty($laravelDataClass)) {
            return null;
        }

        return (new BodyParams($laravelDataClass, $this->config))->generate();
    }
}

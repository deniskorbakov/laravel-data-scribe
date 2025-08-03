<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe;

use DenisKorbakov\LaravelDataScribe\Extractors\LaravelDataExtractor;
use DenisKorbakov\LaravelDataScribe\Params\BodyParams;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Extracting\ParsesValidationRules;
use Knuckles\Scribe\Extracting\Strategies\Strategy;

/** Generates Laravel Data request body parameters from endpoint data */
final class LaravelDataBodyParam extends Strategy
{
    use ParsesValidationRules;

    /**
     * @param ExtractedEndpointData $endpointData Endpoint method and parameters
     * @return array|null Generated body params or null
     */
    public function __invoke(ExtractedEndpointData $endpointData, array $settings = []): ?array
    {
        $laravelDataClass = (new LaravelDataExtractor($endpointData->method))->fromParameters();

        return (new BodyParams($laravelDataClass, $this->config))->generate();
    }
}

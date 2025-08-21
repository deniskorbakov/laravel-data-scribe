<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe;

use DenisKorbakov\LaravelDataScribe\Documentations\BodyParamDoc;
use DenisKorbakov\LaravelDataScribe\Extractors\Attributes\BodyParamAttributeExtract;
use DenisKorbakov\LaravelDataScribe\Extractors\Classes\LaravelDataClassExtract;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Attributes\BodyParam;
use Knuckles\Scribe\Extracting\Strategies\Strategy;
use ReflectionAttribute;
use ReflectionParameter;
use Spatie\LaravelData\Data;

/** Generates Laravel Data request body parameters from endpoint data */
final class LaravelDataBodyParam extends Strategy
{
    /**
     * @param ExtractedEndpointData $endpointData Endpoint method and parameters
     * @param array<string, mixed> $settings
     * @return ?array<string, mixed> Generated body params or null
     */
    public function __invoke(ExtractedEndpointData $endpointData, array $settings = []): ?array
    {
        /** @var ReflectionParameter[] $parameters */
        $parameters = $endpointData->method?->getParameters();
        /** @var ReflectionAttribute<object>[] $attributes */
        $attributes = $endpointData->method?->getAttributes();

        /** @var class-string<Data> $laravelDataClass */
        $laravelDataClass = (new LaravelDataClassExtract($parameters))->extract();
        /** @var array<int, array<string, mixed>>  $attributeArguments */
        $attributeArguments = (new BodyParamAttributeExtract($attributes))->extract();

        return (new BodyParamDoc($laravelDataClass, $attributeArguments, $this->config))->generate();
    }
}

<?php

declare(strict_types=1);

use DenisKorbakov\LaravelDataScribe\Extractors\Attributes\BodyParamAttributeExtract;
use Illuminate\Routing\Route;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Tests\Fixtures\Controllers\LaravelDataController;

mutates(BodyParamAttributeExtract::class);

test('extract body param attribute from updateOneBodyParamsFromAttr', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'updateOneBodyParamsFromAttr']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $attributeArguments = new BodyParamAttributeExtract($extractMethod->method->getAttributes());
    $result = $attributeArguments->extract();

    expect($result)
        ->toBeArray()
        ->toHaveCount(1);
});

test('extract body param attribute from updateAllBodyParamsFromAttr', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'updateAllBodyParamsFromAttr']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $attributeArguments = new BodyParamAttributeExtract($extractMethod->method->getAttributes());
    $result = $attributeArguments->extract();

    expect($result)
        ->toBeArray()
        ->toHaveCount(2);
});

test('extract body param attribute from addBodyParamsFromAttr', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'addBodyParamsFromAttr']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $attributeArguments = new BodyParamAttributeExtract($extractMethod->method->getAttributes());
    $result = $attributeArguments->extract();

    expect($result)
        ->toBeArray()
        ->toHaveCount(1);
});

test('extract body param attribute from emptyLaravelData', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'emptyLaravelData']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $attributeArguments = new BodyParamAttributeExtract($extractMethod->method->getAttributes());
    $result = $attributeArguments->extract();

    expect($result)
        ->toBeArray()
        ->toBeEmpty();
});

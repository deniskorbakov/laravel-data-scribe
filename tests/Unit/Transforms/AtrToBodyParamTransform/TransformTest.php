<?php

declare(strict_types=1);

use DenisKorbakov\LaravelDataScribe\Extractors\Attributes\BodyParamAttributeExtract;
use DenisKorbakov\LaravelDataScribe\Transforms\BodyParam\AtrToBodyParamTransform;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Tests\Fixtures\Controllers\LaravelDataController;
use Illuminate\Routing\Route;
use Tests\Fixtures\Enums\ExampleEnum;

mutates(AtrToBodyParamTransform::class);

test('transform to body param from updateOneBodyParamsFromAttr', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'updateOneBodyParamsFromAttr']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $attributeArguments = (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract();
    $result = (new AtrToBodyParamTransform($attributeArguments))->transform();

    expect($result)
        ->toBeArray()
        ->toHaveCount(1);
});

test('transform to body param from updateAllBodyParamsFromAttr', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'updateAllBodyParamsFromAttr']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $attributeArguments = (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract();
    $result = (new AtrToBodyParamTransform($attributeArguments))->transform();

    expect($result)
        ->toBeArray()
        ->toHaveCount(2);
});

test('transform to body param from addBodyParamsFromAttr', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'addBodyParamsFromAttr']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $attributeArguments = (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract();
    $result = (new AtrToBodyParamTransform($attributeArguments))->transform();

    expect($result)
        ->toBeArray()
        ->toHaveCount(1);
});

test('transform to body param from emptyLaravelData', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'emptyLaravelData']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $attributeArguments = (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract();
    $result = (new AtrToBodyParamTransform($attributeArguments))->transform();

    expect($result)
        ->toBeArray()
        ->toBeEmpty();
});

test('transform to body param from []', function (): void {
    $result = (new AtrToBodyParamTransform([]))->transform();

    expect($result)
        ->toBeArray()
        ->toBeEmpty();
});

test('transform to body param from other args', function (): void {
    $args = [['random', 'args', 123, true]];
    $result = (new AtrToBodyParamTransform($args))->transform();

    expect($result)
        ->toBeArray()
        ->toBeEmpty();
});

test('transform to body param from more arg', function (): void {
    $args = [
        ['name', 'int', 'updated name', false, 1, ['one', 'two'], true],
        ['random', 'args', 123, true],
        ['name 2', 'string', 'updated name 2', true, 'test', ExampleEnum::class, false],
    ];
    $result = (new AtrToBodyParamTransform($args))->transform();

    expect($result)
        ->toBeArray()
        ->toHaveCount(2);
});

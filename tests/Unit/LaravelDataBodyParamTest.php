<?php

declare(strict_types=1);

use DenisKorbakov\LaravelDataScribe\LaravelDataBodyParam;
use Illuminate\Routing\Route;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Tools\DocumentationConfig;
use Tests\Fixtures\Controllers\LaravelDataController;

mutates(LaravelDataBodyParam::class);

test('generate doc body params from method with attributeRules', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'attributeRules']);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsAttributeRules());
});

test('generate doc body params from method with customAttributeRules', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'customAttributeRules']);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsCustomAttributeRules());
});

test('generate doc body params from method with manualRules', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'manualRules']);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsManualRules());
});

test('generate doc body params from method with noRules', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'noRules']);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsNoRules());
});

test('generate doc body params from method with withoutLaravelData', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'withoutLaravelData']);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with emptyLaravelData', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'emptyLaravelData']);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with empty emptyMethod', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'emptyMethod']);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with more moreParameters', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'moreParameters']);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with requestRules', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'requestRules']);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with requestAndLaravelData', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'requestAndLaravelData']);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsAttributeRules());
});

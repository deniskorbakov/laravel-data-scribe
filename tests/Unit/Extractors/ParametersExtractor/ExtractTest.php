<?php

declare(strict_types=1);

namespace Tests\Unit\Extractors\ParametersExtractor;

use DenisKorbakov\LaravelDataScribe\Extractors\ParametersExtractor;
use Illuminate\Routing\Route;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Tests\Fixtures\Controllers\LaravelDataController;
use Tests\Fixtures\ParentClasses\ParentClassLaravelData;

mutates(ParametersExtractor::class);

test('extract class laravel data from emptyLaravelData', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'emptyLaravelData']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new ParametersExtractor($extractMethod->method->getParameters());

    $result = $laravelDataExtractor->extract();

    expect($result)->toBe(ParentClassLaravelData::class);
});

test('extract class laravel data from withoutLaravelData', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'withoutLaravelData']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new ParametersExtractor($extractMethod->method->getParameters());

    $result = $laravelDataExtractor->extract();

    expect($result)->toBeEmpty();
});

test('extract class laravel data from emptyMethod', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'emptyMethod']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new ParametersExtractor($extractMethod->method->getParameters());

    $result = $laravelDataExtractor->extract();

    expect($result)->toBeEmpty();
});

test('extract class laravel data from moreParameters', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'moreParameters']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new ParametersExtractor($extractMethod->method->getParameters());

    $result = $laravelDataExtractor->extract();

    expect($result)->toBeEmpty();
});

test('extract class laravel data from requestRules', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'requestRules']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new ParametersExtractor($extractMethod->method->getParameters());

    $result = $laravelDataExtractor->extract();

    expect($result)->toBeEmpty();
});

test('extract class laravel data from requestAndEmptyLaravelData', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'requestAndEmptyLaravelData']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new ParametersExtractor($extractMethod->method->getParameters());

    $result = $laravelDataExtractor->extract();

    expect($result)->toBe(ParentClassLaravelData::class);
});

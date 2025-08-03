<?php

declare(strict_types=1);

namespace Tests\Unit\Extractors\DataClassExtractor;

use DenisKorbakov\LaravelDataScribe\Extractors\LaravelDataExtractor;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Tests\Fixtures\ParentClasses\ParentClassLaravelData;
use Tests\Fixtures\ParentClasses\WithoutParentClassLaravelData;
use Tests\Fixtures\Requests\RequestRules;

mutates(LaravelDataExtractor::class);

test('extract class laravel data from param ParentClassLaravelData', function () {
    $route = new Route('', '', fn(ParentClassLaravelData $parentClassLaravelData) => null);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new LaravelDataExtractor($extractMethod->method);

    $result = $laravelDataExtractor->fromParameters();

    expect($result)->toBe(ParentClassLaravelData::class);
});

test('extract class laravel data from param from WithoutParentClassLaravelData', function () {
    $route = new Route('', '', fn(WithoutParentClassLaravelData $parentClassLaravelData) => null);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new LaravelDataExtractor($extractMethod->method);

    $result = $laravelDataExtractor->fromParameters();

    expect($result)->toBeEmpty();
});

test('extract class laravel data from param from more type', function () {
    $route = new Route('', '', fn(string $id, int $number, float $price) => null);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new LaravelDataExtractor($extractMethod->method);

    $result = $laravelDataExtractor->fromParameters();

    expect($result)->toBeEmpty();
});

test('extract class laravel data from param from RequestRules', function () {
    $route = new Route('', '', fn(RequestRules $request) => null);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new LaravelDataExtractor($extractMethod->method);

    $result = $laravelDataExtractor->fromParameters();

    expect($result)->toBeEmpty();
});

test('extract class laravel data from param from RequestRules and ParentClassLaravelData', function () {
    $route = new Route('', '', fn(RequestRules $request, ParentClassLaravelData $parentClassLaravelData) => null);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new LaravelDataExtractor($extractMethod->method);

    $result = $laravelDataExtractor->fromParameters();

    expect($result)->toBe(ParentClassLaravelData::class);
});


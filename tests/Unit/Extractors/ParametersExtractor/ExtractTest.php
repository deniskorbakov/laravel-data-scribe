<?php

declare(strict_types=1);

namespace Tests\Unit\Extractors\ParametersExtractor;

use DenisKorbakov\LaravelDataScribe\Extractors\ParametersExtractor;
use Illuminate\Routing\Route;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Tests\Fixtures\ParentClasses\ParentClassLaravelData;
use Tests\Fixtures\ParentClasses\WithoutParentClassLaravelData;
use Tests\Fixtures\Requests\RequestRules;

mutates(ParametersExtractor::class);

test('extract class laravel data from param ParentClassLaravelData', function (): void {
    $route = new Route('', '', fn(ParentClassLaravelData $parentClassLaravelData): null => null);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new ParametersExtractor($extractMethod->method->getParameters());

    $result = $laravelDataExtractor->extract();

    expect($result)->toBe(ParentClassLaravelData::class);
});

test('extract class laravel data from param from WithoutParentClassLaravelData', function (): void {
    $route = new Route('', '', fn(WithoutParentClassLaravelData $parentClassLaravelData): null => null);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new ParametersExtractor($extractMethod->method->getParameters());

    $result = $laravelDataExtractor->extract();

    expect($result)->toBeEmpty();
});

test('extract class laravel data from param from empty arg route', function (): void {
    $route = new Route('', '', fn(): null => null);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new ParametersExtractor($extractMethod->method->getParameters());

    $result = $laravelDataExtractor->extract();

    expect($result)->toBeEmpty();
});

test('extract class laravel data from param from more type', function (): void {
    $route = new Route('', '', fn(string $id, int $number, float $price): null => null);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new ParametersExtractor($extractMethod->method->getParameters());

    $result = $laravelDataExtractor->extract();

    expect($result)->toBeEmpty();
});

test('extract class laravel data from param from RequestRules', function (): void {
    $route = new Route('', '', fn(RequestRules $request): null => null);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new ParametersExtractor($extractMethod->method->getParameters());

    $result = $laravelDataExtractor->extract();

    expect($result)->toBeEmpty();
});

test('extract class laravel data from param from RequestRules and ParentClassLaravelData', function (): void {
    $route = new Route('', '', fn(RequestRules $request, ParentClassLaravelData $parentClassLaravelData): null => null);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $laravelDataExtractor = new ParametersExtractor($extractMethod->method->getParameters());

    $result = $laravelDataExtractor->extract();

    expect($result)->toBe(ParentClassLaravelData::class);
});

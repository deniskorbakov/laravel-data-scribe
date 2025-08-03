<?php

declare(strict_types=1);

use DenisKorbakov\LaravelDataScribe\LaravelDataBodyParam;
use Illuminate\Routing\Route;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Tools\DocumentationConfig;
use Tests\Fixtures\LaravelData\CreateLaravelData;

test('success - generate body params from laravel/data', function (): void {
    $route = new Route('post', '/api/posts', fn (CreateLaravelData $dataStub) => response()->noContent());

    $example = new LaravelDataBodyParam(new DocumentationConfig);

    $result = $example(ExtractedEndpointData::fromRoute($route));

    expect($result)->toBeArray();
});

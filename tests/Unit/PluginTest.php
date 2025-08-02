<?php

declare(strict_types=1);

namespace Tests\Unit;

use DenisKorbakov\LaravelDataScribe\Plugin;
use Illuminate\Routing\Route;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Tools\DocumentationConfig;
use Tests\Fixtures\LaravelData\CreateLaravelData;
use Tests\TestCase;

uses(TestCase::class);

test('foo', function (): void {
    $route = new Route('post', '/api/posts', fn (CreateLaravelData $dataStub) => response()->noContent());

    $example = new Plugin(new DocumentationConfig);

    $result = $example(ExtractedEndpointData::fromRoute($route));

    dd($result);
});

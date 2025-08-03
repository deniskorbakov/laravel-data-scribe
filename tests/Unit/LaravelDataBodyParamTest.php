<?php

declare(strict_types=1);

use DenisKorbakov\LaravelDataScribe\LaravelDataBodyParam;
use Illuminate\Routing\Route;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Tools\DocumentationConfig;
use Tests\Fixtures\LaravelData\AttributeRules;
use Tests\Fixtures\LaravelData\CustomAttributeRules;
use Tests\Fixtures\LaravelData\ManualRules;
use Tests\Fixtures\LaravelData\NoRules;
use Tests\Fixtures\ParentClasses\ParentClassLaravelData;
use Tests\Fixtures\ParentClasses\WithoutParentClassLaravelData;
use Tests\Fixtures\Requests\RequestRules;

mutates(LaravelDataBodyParam::class);

test('generate doc body params from method with AttributeRules', function (): void {
    $route = new Route('', '', fn(AttributeRules $attributeRules): null => null);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsAttributeRules());
});

test('generate doc body params from method with CustomAttributeRules', function (): void {
    $route = new Route('', '', fn(CustomAttributeRules $attributeRules): null => null);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsCustomAttributeRules());
});

test('generate doc body params from method with ManualRules', function (): void {
    $route = new Route('', '', fn(ManualRules $attributeRules): null => null);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsManualRules());
});

test('generate doc body params from method with NoRules', function (): void {
    $route = new Route('', '', fn(NoRules $attributeRules): null => null);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsNoRules());
});

test('generate doc body params from method with WithoutParentClassLaravelData', function (): void {
    $route = new Route('', '', fn(WithoutParentClassLaravelData $attributeRules): null => null);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with ParentClassLaravelData', function (): void {
    $route = new Route('', '', fn(ParentClassLaravelData $attributeRules): null => null);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with empty parameters', function (): void {
    $route = new Route('', '', fn(): null => null);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with more parameters', function (): void {
    $route = new Route('', '', fn(string $id, int $number, float $price): null => null);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with RequestRules', function (): void {
    $route = new Route('', '', fn(RequestRules $requestRules): null => null);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with RequestRules and AttributeRules', function (): void {
    $route = new Route('', '', fn(RequestRules $requestRules, AttributeRules $attributeRules): null => null);
    $laravelDataBodyParam = new LaravelDataBodyParam(new DocumentationConfig());

    $result = $laravelDataBodyParam(ExtractedEndpointData::fromRoute($route));
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsAttributeRules());
});

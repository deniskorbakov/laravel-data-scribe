<?php

declare(strict_types=1);

use DenisKorbakov\LaravelDataScribe\Documentations\BodyParamDoc;
use DenisKorbakov\LaravelDataScribe\Extractors\Attributes\BodyParamAttributeExtract;
use DenisKorbakov\LaravelDataScribe\Extractors\Classes\LaravelDataClassExtract;
use Illuminate\Routing\Route;
use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Tools\DocumentationConfig;
use Tests\Fixtures\Controllers\LaravelDataController;

mutates(BodyParamDoc::class);

test('generate doc body params from method with attributeRules', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'attributeRules']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsAttributeRules());
});

test('generate doc body params from method with customAttributeRules', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'customAttributeRules']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsCustomAttributeRules());
});

test('generate doc body params from method with manualRules', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'manualRules']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsManualRules());
});

test('generate doc body params from method with noRules', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'noRules']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsNoRules());
});

test('generate doc body params from method with withoutLaravelData', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'withoutLaravelData']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with emptyLaravelData', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'emptyLaravelData']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with empty emptyMethod', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'emptyMethod']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with more moreParameters', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'moreParameters']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with requestRules', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'requestRules']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});

test('generate doc body params from method with requestAndLaravelData', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'requestAndLaravelData']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsAttributeRules());
});

test('generate doc body params from method with updateOneBodyParamsFromAttr', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'updateOneBodyParamsFromAttr']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }
    expect($result)->toEqual($this->getParamsUpdateOneBodyParamsFromAttr());
});

test('generate doc body params from method with updateAllBodyParamsFromAttr', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'updateAllBodyParamsFromAttr']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsUpdateAllBodyParamsFromAttr());
});

test('generate doc body params from method with addBodyParamsFromAttr', function (): void {
    $route = new Route('', '', [LaravelDataController::class, 'addBodyParamsFromAttr']);
    $extractMethod = ExtractedEndpointData::fromRoute($route);

    $doc = new BodyParamDoc(
        (new LaravelDataClassExtract($extractMethod->method->getParameters()))->extract(),
        (new BodyParamAttributeExtract($extractMethod->method->getAttributes()))->extract(),
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toEqual($this->getParamsAddBodyParamsFromAttr());
});

test('generate doc body params from empty data', function (): void {
    $doc = new BodyParamDoc(
        '',
        [],
        new DocumentationConfig()
    );

    $result = $doc->generate();
    if (is_array($result)) {
        $this->deleteExampleKey($result);
    }

    expect($result)->toBeEmpty();
});


<?php

declare(strict_types=1);

use DenisKorbakov\LaravelDataScribe\Params\BodyParams;
use Knuckles\Scribe\Tools\DocumentationConfig;
use Tests\Fixtures\LaravelData\AttributeRules;
use Tests\Fixtures\LaravelData\CustomAttributeRules;
use Tests\Fixtures\LaravelData\ManualRules;
use Tests\Fixtures\LaravelData\NoRules;
use Tests\Fixtures\ParentClasses\WithoutParentClassLaravelData;

mutates(BodyParams::class);

test('generate doc body params from AttributeRules', function () {
    $bodyParams = new BodyParams(AttributeRules::class, new DocumentationConfig);
    $result = $bodyParams->generate();

    $this->deleteExampleKey($result);

    expect($result)->toEqual($this->getParamsAttributeRules());
});

test('generate doc body params from CustomAttributeRules', function () {
    $bodyParams = new BodyParams(CustomAttributeRules::class, new DocumentationConfig);
    $result = $bodyParams->generate();

    $this->deleteExampleKey($result);

    expect($result)->toEqual($this->getParamsCustomAttributeRules());
});

test('generate doc body params from ManualRules', function () {
    $bodyParams = new BodyParams(ManualRules::class, new DocumentationConfig);
    $result = $bodyParams->generate();

    $this->deleteExampleKey($result);

    expect($result)->toEqual($this->getParamsManualRules());
});

test('generate doc body params from NoRules', function () {
    $bodyParams = new BodyParams(NoRules::class, new DocumentationConfig);
    $result = $bodyParams->generate();

    $this->deleteExampleKey($result);

    expect($result)->toEqual($this->getParamsNoRules());
});

test('generate doc body params from WithoutParentClassLaravelData', function () {
    $bodyParams = new BodyParams(WithoutParentClassLaravelData::class, new DocumentationConfig);
    $result = $bodyParams->generate();

    $this->deleteExampleKey($result);

    expect($result)->toBeEmpty();
});

test('generate doc body params from none exists class', function () {
    $bodyParams = new BodyParams('', new DocumentationConfig);
    $result = $bodyParams->generate();

    $this->deleteExampleKey($result);

    expect($result)->toBeEmpty();
});

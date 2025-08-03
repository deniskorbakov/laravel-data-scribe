<?php

declare(strict_types=1);

use DenisKorbakov\LaravelDataScribe\Rules\ValidationRules;
use Tests\Fixtures\LaravelData\AttributeRules;
use Tests\Fixtures\LaravelData\CustomAttributeRules;
use Tests\Fixtures\LaravelData\ManualRules;
use Tests\Fixtures\LaravelData\NoRules;
use Tests\Fixtures\ParentClasses\WithoutParentClassLaravelData;

mutates(ValidationRules::class);

test('get validation rules from AttributeRules', function () {
    $validationRules = new ValidationRules(AttributeRules::class);
    $result = $validationRules->rules();

    expect($result)->toEqual($this->getAttributeValidationRules());
});

test('get validation rules from CustomAttributeRules', function () {
    $validationRules = new ValidationRules(CustomAttributeRules::class);
    $result = $validationRules->rules();

    expect($result)->toEqual($this->getCustomAttributeValidationRules());
});

test('get validation rules from ManualRules', function () {
    $validationRules = new ValidationRules(ManualRules::class);
    $result = $validationRules->rules();

    expect($result)->toEqual($this->getManualValidationRules());
});

test('get validation rules from NoRules', function () {
    $validationRules = new ValidationRules(NoRules::class);
    $result = $validationRules->rules();

    expect($result)->toEqual($this->getNoValidationRules());
});

test('get validation rules from WithoutParentClassLaravelData', function () {
    $validationRules = new ValidationRules(WithoutParentClassLaravelData::class);
    $result = $validationRules->rules();

    expect($result)->toBeEmpty();
});


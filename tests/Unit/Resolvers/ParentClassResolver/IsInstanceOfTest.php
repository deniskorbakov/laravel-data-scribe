<?php

declare(strict_types=1);

use DenisKorbakov\LaravelDataScribe\Resolvers\ParentClassResolver;
use Spatie\LaravelData\Data;
use Tests\Fixtures\ParentClasses\ParentClassLaravelData;
use Tests\Fixtures\ParentClasses\WithoutParentClassLaravelData;

mutates(ParentClassResolver::class);

test('is instance of Laravel data', function () {
    $parentClassResolver = new ParentClassResolver(ParentClassLaravelData::class);

    $result = $parentClassResolver->isInstanceOf(Data::class);

    expect($result)->toBeTrue();
});

test('is not instance of Laravel data', function () {
    $parentClassResolver = new ParentClassResolver(WithoutParentClassLaravelData::class);

    $result = $parentClassResolver->isInstanceOf(Data::class);

    expect($result)->toBeFalse();
});

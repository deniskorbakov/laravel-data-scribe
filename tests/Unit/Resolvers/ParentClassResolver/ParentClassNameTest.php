<?php

declare(strict_types=1);

use DenisKorbakov\LaravelDataScribe\Resolvers\ParentClassResolver;
use Spatie\LaravelData\Data;
use Tests\Fixtures\ParentClasses\ParentClassLaravelData;
use Tests\Fixtures\ParentClasses\WithoutParentClassLaravelData;

mutates(ParentClassResolver::class);

test('get parent class name', function () {
    $parentClassResolver = new ParentClassResolver(ParentClassLaravelData::class);

    $result = $parentClassResolver->parentClassName();

    expect($result)->toBe(Data::class);
});

test('get empty string', function () {
    $parentClassResolver = new ParentClassResolver(WithoutParentClassLaravelData::class);

    $result = $parentClassResolver->parentClassName();

    expect($result)->toBe('');
});


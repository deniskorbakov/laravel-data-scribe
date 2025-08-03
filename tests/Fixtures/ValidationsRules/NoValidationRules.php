<?php

declare(strict_types=1);

use Illuminate\Validation\Rules\Enum;
use Tests\Fixtures\Enums\ExampleEnum;

return [
    'firstName' => [
        'required',
        'string',
    ],
    'lastName'  => [
        'nullable',
        'string',
    ],
    'age'       => [
        'required',
        'numeric',
    ],
    'price'     => [
        'required',
        'numeric',
    ],
    'items'     => [
        'required',
        'array',
    ],
    'enum'      => [
        'required',
        new Enum(ExampleEnum::class),
    ],
];

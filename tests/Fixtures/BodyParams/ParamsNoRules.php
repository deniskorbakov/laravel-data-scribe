<?php

declare(strict_types=1);

use Tests\Fixtures\Enums\ExampleEnum;

return [
    'firstName' => [
        'name' => 'firstName',
        'required' => true,
        'type' => 'string',
        'description' => '',
        'nullable' => false,
    ],
    'lastName' => [
        'name' => 'lastName',
        'required' => false,
        'type' => 'string',
        'description' => '',
        'nullable' => true,
    ],
    'age' => [
        'name' => 'age',
        'required' => true,
        'type' => 'number',
        'description' => '',
        'nullable' => false,
    ],
    'price' => [
        'name' => 'price',
        'required' => true,
        'type' => 'number',
        'description' => '',
        'nullable' => false,
    ],
    'items' => [
        'name' => 'items',
        'required' => true,
        'type' => 'object',
        'description' => '',
        'nullable' => false,
    ],
    'enum' => [
        'name' => 'enum',
        'required' => true,
        'type' => 'string',
        'description' => '',
        'nullable' => false,
        'enumValues' => array_map(fn (ExampleEnum $exampleEnum) => $exampleEnum->value, ExampleEnum::cases()),
    ],
];

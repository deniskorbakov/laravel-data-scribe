<?php

declare(strict_types=1);

return [
    'name'               => [
        'name'        => 'name',
        'required'    => true,
        'type'        => 'string',
        'description' => 'Must not be greater than 100 characters.',
        'nullable'    => false,
    ],
    'description'        => [
        'name'        => 'description',
        'required'    => true,
        'type'        => 'string',
        'description' => 'Must not be greater than 500 characters.',
        'nullable'    => false,
    ],
    'price'              => [
        'name'        => 'price',
        'required'    => true,
        'type'        => 'number',
        'description' => 'Must be at least 0. Must not be greater than 9999.99.',
        'nullable'    => false,
    ],
    'items'              => [
        'name'        => 'items',
        'required'    => true,
        'type'        => 'object[]',
        'description' => 'Must have at least 1 items.',
        'nullable'    => false,
    ],
    'items[].product_id' => [
        'name'        => 'items[].product_id',
        'required'    => true,
        'type'        => 'integer',
        'description' => 'The <code>id</code> of an existing record in the products table.',
        'nullable'    => false,
    ],
    'items[].quantity'   => [
        'name'        => 'items[].quantity',
        'required'    => true,
        'type'        => 'integer',
        'description' => 'Must be at least 1. Must not be greater than 10.',
        'nullable'    => false,
    ],
    'new'                => [
        'name'        => 'new',
        'description' => 'add new params',
        'type'        => 'string',
        'required'    => false,
        'enumValues'  => [
            'Example One',
            'Example Two',
        ],
        'nullable'    => false,
    ],
];

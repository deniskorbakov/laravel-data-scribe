<?php

declare(strict_types=1);

return [
    'name' => [
        'name' => 'name',
        'required' => true,
        'type' => 'string',
        'description' => 'Must be at least 1 character. Must not be greater than 100 characters.',
        'nullable' => false
    ],
    'email' => [
        'name' => 'email',
        'required' => true,
        'type' => 'string',
        'description' => 'Must be a valid email address.',
        'nullable' => false
    ],
    'price' => [
        'name' => 'price',
        'required' => true,
        'type' => 'number',
        'description' => 'Must be between 0 and 100.',
        'nullable' => false
    ],
    'age' => [
        'name' => 'age',
        'required' => true,
        'type' => 'integer',
        'description' => 'Must be at least 18.',
        'nullable' => false
    ],
    'code' => [
        'name' => 'code',
        'required' => true,
        'type' => 'string',
        'description' => 'Must be 10 characters.',
        'nullable' => false
    ],
    'active' => [
        'name' => 'active',
        'required' => false,
        'type' => 'boolean',
        'description' => '',
        'nullable' => false
    ],
    'items' => [
        'name' => 'items',
        'required' => true,
        'type' => 'object',
        'description' => '',
        'nullable' => false
    ],
    'start_date' => [
        'name' => 'start_date',
        'required' => true,
        'type' => 'string',
        'description' => 'Must be a valid date. Must be a date after <code>today</code>.',
        'nullable' => false
    ],
    'end_date' => [
        'name' => 'end_date',
        'required' => true,
        'type' => 'string',
        'description' => 'Must be a valid date. Must be a date before <code>start_date</code>.',
        'nullable' => false
    ],
    'status' => [
        'name' => 'status',
        'required' => true,
        'type' => 'string',
        'description' => '',
        'nullable' => false,
        'enumValues' => ['active', 'inactive', 'pending']
    ],
    'account_type' => [
        'name' => 'account_type',
        'required' => true,
        'type' => 'string',
        'description' => 'Must not be one of <code>banned</code> or <code>suspended</code>.',
        'nullable' => false
    ],
    'proper_name' => [
        'name' => 'proper_name',
        'required' => false,
        'type' => 'string',
        'description' => 'Must match the regex /^[A-Z][a-z]+$/.',
        'nullable' => true
    ],
    'website' => [
        'name' => 'website',
        'required' => true,
        'type' => 'string',
        'description' => 'Must be a valid URL.',
        'nullable' => false
    ],
    'identifier' => [
        'name' => 'identifier',
        'required' => true,
        'type' => 'string',
        'description' => 'Must be a valid UUID.',
        'nullable' => false
    ]
];

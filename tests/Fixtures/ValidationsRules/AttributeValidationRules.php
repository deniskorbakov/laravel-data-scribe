<?php

declare(strict_types=1);

return [
    'name'         => [
        'string',
        'required',
        'min:1',
        'max:100',
    ],
    'email'        => [
        'required',
        'string',
        'email:rfc',
    ],
    'price'        => [
        'required',
        'numeric',
        'between:0,100',
    ],
    'age'          => [
        'required',
        'numeric',
        'integer',
        'min:18',
    ],
    'code'         => [
        'required',
        'string',
        'size:10',
    ],
    'active'       => [
        'boolean',
    ],
    'items'        => [
        'required',
        'array',
    ],
    'start_date'   => [
        'required',
        'string',
        'date',
        'after:today',
    ],
    'end_date'     => [
        'required',
        'string',
        'date',
        'before:start_date',
    ],
    'status'       => [
        'required',
        'string',
        new Illuminate\Validation\Rules\In(['active', 'inactive', 'pending']),
    ],
    'account_type' => [
        'required',
        'string',
        new Illuminate\Validation\Rules\NotIn(['banned', 'suspended']),
    ],
    'proper_name'  => [
        'nullable',
        'string',
        'sometimes',
        'regex:/^[A-Z][a-z]+$/',
    ],
    'website'      => [
        'required',
        'string',
        'url',
    ],
    'identifier'   => [
        'required',
        'string',
        'uuid',
    ],
];

<?php

declare(strict_types=1);

use Tests\Fixtures\LaravelData\Rules\PhoneNumberRule;
use Tests\Fixtures\LaravelData\Rules\StrongPasswordRule;

return [
    'phone'    => [
        'required',
        'string',
        new PhoneNumberRule(),
    ],
    'password' => [
        'required',
        'string',
        new StrongPasswordRule(),
    ],
];

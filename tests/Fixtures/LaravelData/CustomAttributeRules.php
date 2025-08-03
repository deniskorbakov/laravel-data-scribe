<?php

declare(strict_types=1);

namespace Tests\Fixtures\LaravelData;

use Spatie\LaravelData\Data;
use Tests\Fixtures\LaravelData\Attributes\PhoneNumber;
use Tests\Fixtures\LaravelData\Attributes\StrongPassword;

final class CustomAttributeRules extends Data
{
    public function __construct(
        #[PhoneNumber]
        public string $phone,
        #[StrongPassword]
        public string $password,
    ) {
    }
}

<?php

declare(strict_types=1);

namespace Tests\Fixtures\LaravelData\Attributes;

use Attribute;
use Spatie\LaravelData\Attributes\Validation\CustomValidationAttribute;
use Spatie\LaravelData\Support\Validation\ValidationPath;
use Tests\Fixtures\LaravelData\Rules\StrongPasswordRule;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_PARAMETER)]
final class StrongPassword extends CustomValidationAttribute
{
    public function getRules(ValidationPath $path): StrongPasswordRule
    {
        return new StrongPasswordRule();
    }
}


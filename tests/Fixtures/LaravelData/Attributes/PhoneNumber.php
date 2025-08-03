<?php

declare(strict_types=1);

namespace Tests\Fixtures\LaravelData\Attributes;

use Attribute;
use Spatie\LaravelData\Attributes\Validation\CustomValidationAttribute;
use Spatie\LaravelData\Support\Validation\ValidationPath;
use Tests\Fixtures\LaravelData\Rules\PhoneNumberRule;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_PARAMETER)]
final class PhoneNumber extends CustomValidationAttribute
{
    public function getRules(ValidationPath $path): PhoneNumberRule
    {
        return new PhoneNumberRule();
    }
}

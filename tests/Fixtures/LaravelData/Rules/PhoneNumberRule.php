<?php

declare(strict_types=1);

namespace Tests\Fixtures\LaravelData\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class PhoneNumberRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^\+?\d{10,15}$/', $value)) {
            $fail('The phone number must contain between 10 and 15 digits');
        }
    }
}

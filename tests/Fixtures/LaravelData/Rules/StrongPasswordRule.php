<?php

declare(strict_types=1);

namespace Tests\Fixtures\LaravelData\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class StrongPasswordRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $value)) {
            $fail('The password must contain at least 8 characters, including uppercase, lowercase letters, numbers and special characters');
        }
    }
}

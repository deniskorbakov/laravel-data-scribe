<?php

declare(strict_types=1);

namespace Tests\Fixtures\LaravelData;

use Spatie\LaravelData\Attributes\Validation\After;
use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Attributes\Validation\Before;
use Spatie\LaravelData\Attributes\Validation\Between;
use Spatie\LaravelData\Attributes\Validation\BooleanType;
use Spatie\LaravelData\Attributes\Validation\Date;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\NotIn;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\Size;
use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Url;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;

final class AttributeRules extends Data
{
    public function __construct(
        #[Required, Min(1), Max(100)]
        public string $name,
        #[Email]
        public string $email,
        #[Numeric, Between(0, 100)]
        public float $price,
        #[IntegerType, Min(18)]
        public int $age,
        #[StringType, Size(10)]
        public string $code,
        #[BooleanType]
        public bool $active,
        #[ArrayType]
        public array $items,
        #[Date, After('today')]
        public string $start_date,
        #[Date, Before('start_date')]
        public string $end_date,
        #[In(['active', 'inactive', 'pending'])]
        public string $status,
        #[NotIn(['banned', 'suspended'])]
        public string $account_type,
        #[Sometimes, Regex('/^[A-Z][a-z]+$/')]
        public ?string $proper_name,
        #[Url]
        public string $website,
        #[Uuid]
        public string $identifier,
    ) {
    }
}

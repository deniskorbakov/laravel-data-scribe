<?php

declare(strict_types=1);

namespace Tests\Fixtures\LaravelData;

use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

final class CreateLaravelData extends Data
{
    public function __construct(
        #[Required, Min(1)]
        public string $name,
    ){
    }
}

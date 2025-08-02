<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Params;

use DenisKorbakov\LaravelDataScribe\Rules\ValidationRules;
use Knuckles\Scribe\Extracting\ParsesValidationRules;
use Knuckles\Scribe\Tools\DocumentationConfig;
use Spatie\LaravelData\Data;

final class BodyParams
{
    use ParsesValidationRules;

    /** @param class-string<Data> $className */
    public function __construct(
        readonly public string $className,
        readonly public DocumentationConfig $config,
    ) {
    }

    public function generate(): array
    {
        $parameters = $this->getParametersFromValidationRules(
            (new ValidationRules($this->className))->rules()
        );

        return $this->normaliseArrayAndObjectParameters($parameters);
    }
}

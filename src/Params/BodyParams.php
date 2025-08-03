<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Params;

use DenisKorbakov\LaravelDataScribe\Rules\ValidationRules;
use Knuckles\Scribe\Extracting\ParsesValidationRules;
use Knuckles\Scribe\Tools\DocumentationConfig;
use Spatie\LaravelData\Data;

/** Generates normalized body parameters from a class's validation rules */
final class BodyParams
{
    use ParsesValidationRules;

    /**
     * @param class-string<Data> $className Class containing validation rules
     * @param DocumentationConfig $config   Documentation configuration
     */
    public function __construct(
        readonly public string $className,
        readonly public DocumentationConfig $config,
    ) {
    }

    /**
     * @return array<string, mixed> Normalized parameters with validation rules
     * @see ValidationRules Used to extract the base validation rules
     */
    public function generate(): array
    {
        if (! class_exists($this->className)) {
            return [];
        }

        $parameters = $this->getParametersFromValidationRules(
            (new ValidationRules($this->className))->rules()
        );

        return $this->normaliseArrayAndObjectParameters($parameters);
    }
}

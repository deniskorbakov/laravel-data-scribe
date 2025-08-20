<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Documentations;

use DenisKorbakov\LaravelDataScribe\Params\BodyParams;
use Knuckles\Scribe\Tools\DocumentationConfig;

final readonly class BodyParamDoc implements Doc
{
    public function __construct(
        public string $laravelDataClass,
        public array $bodyParamAttribute,
        public DocumentationConfig $config,
    ) {}

    public function generate(): ?array
    {
        if (empty($this->laravelDataClass)) {
            return null;
        }

        return (new BodyParams($this->laravelDataClass, $this->config))->generate();
    }
}

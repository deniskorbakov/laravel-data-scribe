<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Documentations;

use DenisKorbakov\LaravelDataScribe\Params\BodyParams;
use DenisKorbakov\LaravelDataScribe\Transforms\BodyParam\AtrToBodyParamTransform;
use Knuckles\Scribe\Tools\DocumentationConfig;
use Spatie\LaravelData\Data;

final readonly class BodyParamDoc implements Doc
{

    /**
     * @param  class-string<Data> $laravelDataClass
     * @param array<int, array<string, mixed>> $attributeArguments
     */
    public function __construct(
        public string $laravelDataClass,
        public array $attributeArguments,
        public DocumentationConfig $config,
    ) {}

    /** @return ?array<string, array<string, mixed>> */
    public function generate(): ?array
    {
        if (empty($this->laravelDataClass)) {
            return null;
        }

        $attributesDoc = (new AtrToBodyParamTransform($this->attributeArguments))->transform();
        $bodyParamsDoc = (new BodyParams($this->laravelDataClass, $this->config))->generate();

        return array_merge($bodyParamsDoc, $attributesDoc);
    }
}

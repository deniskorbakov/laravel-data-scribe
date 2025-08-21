<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Documentations;

use DenisKorbakov\LaravelDataScribe\Params\BodyParams;
use DenisKorbakov\LaravelDataScribe\Transforms\BodyParam\AtrTBodyParamTransform;
use Knuckles\Scribe\Tools\DocumentationConfig;

final readonly class BodyParamDoc implements Doc
{
    public function __construct(
        public string $laravelDataClass,
        public array $attributeArguments,
        public DocumentationConfig $config,
    ) {}

    public function generate(): ?array
    {
        if (empty($this->laravelDataClass)) {
            return null;
        }
        $attributesDoc = (new AtrTBodyParamTransform($this->attributeArguments))->transform();
        $bodyParamsDoc = (new BodyParams($this->laravelDataClass, $this->config))->generate();

        return array_merge($attributesDoc, $bodyParamsDoc);
    }
}

<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Transforms\BodyParam;

interface BodyParamTransform
{
    /**
     * @return array<string, array<string, mixed>>
     */
    public function transform(): array;
}

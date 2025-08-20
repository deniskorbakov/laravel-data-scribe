<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Extractors\Attributes;

interface AttributeExtract
{
    /** @return array<string, mixed> */
    public function extract(): array;
}

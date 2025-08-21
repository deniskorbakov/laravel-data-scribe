<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Extractors\Classes;

interface ClassExtract
{
    public function extract(): string;
}

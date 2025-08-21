<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Documentations;

interface Doc
{
    /** @return ?array<string, array<string, mixed>> */
    public function generate(): ?array;
}

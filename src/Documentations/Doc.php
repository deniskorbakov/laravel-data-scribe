<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Documentations;

interface Doc
{
    public function generate(): ?array;
}

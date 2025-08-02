<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Resolvers;

final readonly class ParentClassResolver
{
    public function __construct(
        public string $className,
    ){
    }

    public function parentClassName(): string
    {
        return get_parent_class($this->className) ?? '';
    }

    public function isInstanceOf(string $className): bool
    {
        return is_a($className, $this->parentClassName(), true);
    }
}

<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe\Resolvers;

/** Resolves parent class information */
final readonly class ParentClassResolver
{
    /** @param class-string $className The child class to inspect */
    public function __construct(
        public string $className,
    ) {
    }

    /** @return class-string Parent class name or empty string if none */
    public function parentClassName(): string
    {
        return get_parent_class($this->className) ?? '';
    }

    /**
     * @param class-string $className The class to check against
     * @return bool Whether the parent is instance of given class
     */
    public function isInstanceOf(string $className): bool
    {
        return is_a($this->parentClassName(), $className, true);
    }
}

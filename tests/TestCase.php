<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Spatie\LaravelData\LaravelDataServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [LaravelDataServiceProvider::class];
    }

    protected function getAttributeValidationRules(): array
    {
        return include __DIR__ . '/Fixtures/ValidationsRules/AttributeValidationRules.php';
    }

    protected function getCustomAttributeValidationRules(): array
    {
        return include __DIR__ . '/Fixtures/ValidationsRules/CustomAttributeValidationRules.php';
    }

    protected function getManualValidationRules(): array
    {
        return include __DIR__ . '/Fixtures/ValidationsRules/ManualValidationRules.php';
    }

    protected function getNoValidationRules(): array
    {
        return include __DIR__ . '/Fixtures/ValidationsRules/NoValidationRules.php';
    }
}

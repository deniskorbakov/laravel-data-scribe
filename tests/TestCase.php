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

    /** @param array<string, mixed> $array */
    protected function deleteExampleKey(array &$array): void
    {
        data_forget($array, '*.example');
    }

    protected function getParamsAddBodyParamsFromAttr(): array
    {
        return include __DIR__ . '/Fixtures/BodyParams/ParamsAddBodyParamsFromAttr.php';
    }

    protected function getParamsUpdateAllBodyParamsFromAttr(): array
    {
        return include __DIR__ . '/Fixtures/BodyParams/ParamsUpdateAllBodyParamsFromAttr.php';
    }

    protected function getParamsUpdateOneBodyParamsFromAttr(): array
    {
        return include __DIR__ . '/Fixtures/BodyParams/ParamsUpdateOneBodyParamsFromAttr.php';
    }

    protected function getParamsAttributeRules(): array
    {
        return include __DIR__ . '/Fixtures/BodyParams/ParamsAttributeRules.php';
    }

    protected function getParamsCustomAttributeRules(): array
    {
        return include __DIR__ . '/Fixtures/BodyParams/ParamsCustomAttributeRules.php';
    }

    protected function getParamsManualRules(): array
    {
        return include __DIR__ . '/Fixtures/BodyParams/ParamsManualRules.php';
    }

    protected function getParamsNoRules(): array
    {
        return include __DIR__ . '/Fixtures/BodyParams/ParamsNoRules.php';
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

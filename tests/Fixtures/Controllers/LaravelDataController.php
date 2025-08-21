<?php

declare(strict_types=1);

namespace Tests\Fixtures\Controllers;

use Knuckles\Scribe\Attributes\BodyParam;
use Tests\Fixtures\Enums\ExampleEnum;
use Tests\Fixtures\LaravelData\AttributeRules;
use Tests\Fixtures\LaravelData\CustomAttributeRules;
use Tests\Fixtures\LaravelData\ManualRules;
use Tests\Fixtures\LaravelData\NoRules;
use Tests\Fixtures\ParentClasses\ParentClassLaravelData;
use Tests\Fixtures\ParentClasses\WithoutParentClassLaravelData;
use Tests\Fixtures\Requests\RequestRules;

final class LaravelDataController
{
    public function attributeRules(AttributeRules $attributeRules): void
    {
    }

    public function customAttributeRules(CustomAttributeRules $customAttributeRules): void
    {
    }

    public function manualRules(ManualRules $manualRules): void
    {
    }

    public function noRules(NoRules $noRules): void
    {
    }

    public function withoutLaravelData(WithoutParentClassLaravelData $withoutParentClassLaravelData): void
    {
    }

    public function emptyLaravelData(ParentClassLaravelData $parentClassLaravelData): void
    {
    }

    public function emptyMethod(): void
    {
    }

    public function moreParameters(string $id, int $number, float $price): void
    {
    }

    public function requestRules(RequestRules $requestRules): void
    {
    }

    public function requestAndLaravelData(RequestRules $requestRules, AttributeRules $attributeRules): void
    {
    }

    public function requestAndEmptyLaravelData(RequestRules $requestRules, ParentClassLaravelData $parentClassLaravelData): void
    {
    }

    #[BodyParam('name', 'int', 'updated name', false, 1, ['one', 'two'], true)]
    public function updateOneBodyParamsFromAttr(AttributeRules $attributeRules): void
    {
    }

    #[BodyParam('phone', 'bool', 'updated phone', required: true, example: true)]
    #[BodyParam('password', 'string', 'updated password', true, 'pass', null, false)]
    public function updateAllBodyParamsFromAttr(CustomAttributeRules $customAttributeRules): void
    {
    }

    #[BodyParam('new', 'string', 'add new params', required: false, example: 'param', enum: ExampleEnum::class)]
    public function addBodyParamsFromAttr(ManualRules $manualRules): void
    {
    }
}

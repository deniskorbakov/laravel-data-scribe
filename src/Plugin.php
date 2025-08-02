<?php

declare(strict_types=1);

namespace DenisKorbakov\LaravelDataScribe;

use Knuckles\Camel\Extraction\ExtractedEndpointData;
use Knuckles\Scribe\Extracting\ParsesValidationRules;
use Knuckles\Scribe\Extracting\Strategies\Strategy;
use ReflectionException;
use Spatie\LaravelData\Data;

final class Plugin extends Strategy
{
    use ParsesValidationRules;

    /**
     * @throws ReflectionException
     */
    public function __invoke(ExtractedEndpointData $endpointData, array $settings = []): ?array
    {
        foreach ($endpointData->method->getParameters() as $argument) {
            $nameClassArgument = $argument->getType()->getName();
            $nameParentClassArgument = get_parent_class($nameClassArgument);

            if ($nameParentClassArgument) {
                $isInstanceDataClass = is_a(Data::class, $nameParentClassArgument, true);

                if ($isInstanceDataClass) {
                    $validateRulesArgumentClass = $nameClassArgument::getValidationRules([]);
                    $parameters = $this->getParametersFromValidationRules($validateRulesArgumentClass);

                    return $this->normaliseArrayAndObjectParameters($parameters);
                }
            }
        }

        return [];
    }
}

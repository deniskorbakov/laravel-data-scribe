<?php

declare(strict_types=1);

test('Not use debugging functions')
    ->expect(['dd', 'dump', 'die'])
    ->not->toBeUsed();

test('Php code should follow basic standards')
    ->preset()
    ->php();

test('Code should pass basic security checks')
    ->preset()
    ->security();

test('Core architecture rules with exceptions')
    ->preset()
    ->strict();

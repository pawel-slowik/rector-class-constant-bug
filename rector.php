<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php55\Rector\String_\StringClassNameToClassConstantRector;

return RectorConfig::configure()
    ->withPaths(
        [
            __DIR__ . '/src',
        ]
    )
    ->withRules(
        [
            StringClassNameToClassConstantRector::class,
        ]
    );

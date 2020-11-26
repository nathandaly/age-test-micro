<?php

declare(strict_types=1);

namespace Core;

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

return static function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        // Add dependencies as closures...
    ]);
};

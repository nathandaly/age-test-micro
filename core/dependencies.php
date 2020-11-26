<?php

declare(strict_types=1);

namespace Core;

use DI\Container;
use DI\ContainerBuilder;
use Illuminate\Database\Capsule\Manager;

return static function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        'db' => function (Container $container) {
            $capsule = new Manager();
            $capsule->addConnection($container['settings']['db']);

            $capsule->setAsGlobal();
            $capsule->bootEloquent();

            return $capsule;
        },
        // Add dependencies as closures...
    ]);
};

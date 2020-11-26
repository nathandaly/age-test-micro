<?php

declare(strict_types=1);

namespace Core;

use DI\Container;
use DI\ContainerBuilder;
use Illuminate\Database\Capsule\Manager;
use Jenssegers\Blade\Blade;

return static function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        'db' => function (Container $container) {
            $capsule = new Manager();
            $capsule->addConnection($container->get('settings')['db']);

            $capsule->setAsGlobal();
            $capsule->bootEloquent();

            return $capsule;
        },
        'view' => new Blade(__DIR__ . '/../resources/views', __DIR__ . '/../var/cache'),
        // Add dependencies as closures...
    ]);
};

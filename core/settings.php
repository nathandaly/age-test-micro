<?php

declare(strict_types=1);

namespace Core;

use DI\ContainerBuilder;
use Dotenv\Dotenv;

return static function (ContainerBuilder $containerBuilder) {
    $settingsArray = Dotenv::createArrayBacked(__DIR__ . '/../')->load();

    $settings['displayErrorDetails'] = $settingsArray['DISPLAY_ERRORS'] ?? false;

    $settings['db'] = [
        'driver' => 'mysql',
        'host' => $settingsArray['DB_HOST'] ?? 'localhost',
        'database' => $settingsArray['DB_NAME'] ?? 'database',
        'username' => $settingsArray['DB_USER'] ?? 'root',
        'password' => $settingsArray['DB_PASS'] ?? 'password',
        'charset'   => $settingsArray['DB_CHARSET'] ?? 'utf8',
        'collation' => $settingsArray['DB_COLLATION'] ?? 'utf8_unicode_ci',
        'prefix'    => $settingsArray['DB_PREFIX'] ?? '',
    ];

    $containerBuilder->addDefinitions([
        'settings' => $settings,
    ]);
};

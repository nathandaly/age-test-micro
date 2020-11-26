<?php

declare(strict_types=1);

namespace Core;

use DI\ContainerBuilder;
use Dotenv\Dotenv;

return static function (ContainerBuilder $containerBuilder) {
    $settingsArray = Dotenv::createArrayBacked(__DIR__ . '/../')->load();

    $settingsArray['displayErrorDetails'] = true;

    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => $settingsArray,
    ]);
};

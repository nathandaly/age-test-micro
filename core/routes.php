<?php

declare(strict_types=1);

namespace Core;

use App\Http\Controllers\CalculationController;
use App\Http\Controllers\HomeController;
use Slim\App;

return static function (App $app) {
    $app->post('/calculate', CalculationController::class)->setName('home.calculate');
    $app->get('/', HomeController::class)->setName('home.index');
};

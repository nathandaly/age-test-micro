<?php

declare(strict_types=1);

namespace Core;

use App\Http\Controllers\CalculationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use Slim\App;

return static function (App $app) {
    $app->post('/calculate', CalculationController::class)->setName('home.calculate');
    $app->get('/entries', ReportController::class)->setName('reports');
    $app->get('/', HomeController::class)->setName('home');
};

<?php

declare(strict_types=1);

use Core\ResponseHandler;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;

require __DIR__ . './../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

$settings = require __DIR__ . '/../core/settings.php';
$settings($containerBuilder);

$dependencies = require __DIR__ . '/../core/dependencies.php';
$dependencies($containerBuilder);

$container = $containerBuilder->build();
AppFactory::setContainer($container);
$app = AppFactory::create();
$callableResolver = $app->getCallableResolver();

$routes = require __DIR__ . '/../core/routes.php';
$routes($app);

/** @var bool $displayErrorDetails */
$displayErrorDetails = $container->get('settings')['displayErrorDetails'];

// Create Request object from globals
$serverRequestCreator = ServerRequestCreatorFactory::create();
$request = $serverRequestCreator->createServerRequestFromGlobals();

// Run App & Emit Response
$response = $app->handle($request);
$responseEmitter = new ResponseHandler();
$responseEmitter->emit($response);

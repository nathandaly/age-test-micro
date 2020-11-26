<?php

namespace App\Http\Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;

class Controller
{
    protected ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function render(string $path, array $args = []): string
    {
        return $this->container->get('view')->render($path, $args);
    }

    protected function view(ResponseInterface $response, string $path, array $args = []): ResponseInterface
    {
        $response->getBody()->write($this->render($path, $args));

        return $response;
    }

    protected function json(ResponseInterface $response, array $payload = [], int $statusCode = 200): ResponseInterface
    {
        $response->getBody()->write(json_encode($payload));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($statusCode);
    }
}

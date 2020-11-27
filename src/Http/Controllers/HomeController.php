<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Request;

final class HomeController extends Controller
{
    public function __invoke(Request $request, ResponseInterface $response)
    {
        return $this->view($response, 'home/index', []);
    }
}

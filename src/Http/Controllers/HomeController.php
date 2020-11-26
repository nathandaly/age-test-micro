<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Request;

class HomeController extends Controller
{
    public function index(Request $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view($response, 'home/index', []);
    }
}

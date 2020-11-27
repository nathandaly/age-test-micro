<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\AgeCalculator;
use App\AgeDto;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Request;

final class ReportController extends Controller
{
    public function __invoke(Request $request, ResponseInterface $response)
    {
        $entries = $this->container->get('db')->table('entries')->get();

        return $this->view($response, 'home/report', [
            'entries' => $entries,
        ]);
    }
}

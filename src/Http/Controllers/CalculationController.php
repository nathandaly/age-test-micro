<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\AgeCalculator;
use App\AgeDto;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Request;

final class CalculationController extends Controller
{
    public function __invoke(Request $request, ResponseInterface $response)
    {
        $body = $request->getParsedBody();
        $ageCalculator = new AgeCalculator($body['dob'], AgeCalculator::HOURS_FORMAT);
        $ageArray = $ageCalculator();
        $age = new AgeDto($ageArray['years'], $ageArray['months'], $ageArray['days']);
        $human = $ageCalculator->toHumanReadable();

        $this->container->get('db')->table('entries')->insert([
            'name' => $body['name'],
            'dob' => $body['dob'],
        ]);

        return $this->json($response, [
            'age' => $age,
            'human' => 'You are ' . $human,
            'months' => number_format($ageCalculator->months()),
            'days' => number_format($ageCalculator->days()),
            'hours' => number_format($ageCalculator->hours()),
            'minutes' => number_format($ageCalculator->minutes()),
            'seconds' => number_format($ageCalculator->seconds()),
        ]);
    }
}

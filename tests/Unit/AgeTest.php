<?php

use App\AgeCalculator;
use Carbon\Carbon;

test('Calculate date of birth WITH hours returns age in years, days and hours', function () {
    $ageCalculator = new AgeCalculator('1985-08-12 19:05', AgeCalculator::HOURS_FORMAT);
    $humanReadable = $ageCalculator
        ->setEndDate('2020-11-27 11:10', 'Y-m-d H:i')
        ->toHumanReadable();

    $this->assertSame($humanReadable, '35 years, 3 months, 14 days and 16 hours old');
});

test('Calculate date of birth WITHOUT hours returns age in years and days', function () {
    $ageCalculator = new AgeCalculator('1985-08-12');
    $humanReadable = $ageCalculator->setEndDate('2020-11-27')->toHumanReadable();

    $this->assertSame($humanReadable, '35 years, 3 months, 15 days old');
});

test('Calculate date of birth leap year WITH hours returns age in years, days and hours', function () {
    $ageCalculator = new AgeCalculator('1992-08-12 19:05', AgeCalculator::HOURS_FORMAT);
    $humanReadable = $ageCalculator
        ->setEndDate('2020-11-27 11:10', AgeCalculator::HOURS_FORMAT)
        ->toHumanReadable();

    $this->assertSame($humanReadable, '28 years, 3 months, 14 days and 16 hours old');
});

test('Calculate date of birth leap year WITHOUT hours returns age in years and days', function () {
    $ageCalculator = new AgeCalculator('1992-08-12');
    $humanReadable = $ageCalculator->setEndDate('2020-11-27')->toHumanReadable();

    $this->assertSame($humanReadable, '28 years, 3 months, 15 days old');
});

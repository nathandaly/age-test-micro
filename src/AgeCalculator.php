<?php

declare(strict_types=1);

namespace App;

use App\Models\Age;
use Carbon\Carbon;

/**
 * Demonstrate all the different ways you can calculate age and the power of Carbon.
 *
 * Class AgeCalculator
 * @package App
 */
class AgeCalculator
{
    public const FEB_28 = 59;

    public const MAX_MONTHS = 12;

    public CONST DATE_FORMAT = 'Y-m-d';

    public CONST HOURS_FORMAT = 'Y-m-d H:i';

    protected ?Carbon $dataOfBirth;

    protected ?Carbon $endDate;

    public function __construct(?string $dateOfBirth, string $format = self::DATE_FORMAT)
    {
        if ($dateOfBirth) {
            $this->dataOfBirth = Carbon::createFromFormat($format, $dateOfBirth);
        }
    }

    /**
     * Demonstrate a more classic approach to age calculation.
     *
     * @return array
     */
    public function __invoke(): array
    {
        $dateOfBirth = $this->getDateOfBirth();
        $currentDateTime = $this->getEndDate();

        // Indicates whether dob year has extra day compare to present date i.e. Leap years.
        $extraDay = $dateOfBirth->isLeapYear()
            && !$currentDateTime->isLeapYear()
            && $dateOfBirth->dayOfYear > self::FEB_28 ? 1 : 0;

        // Indicates whether dob has already been celebrated this year.
        $hasDobOccurred = $currentDateTime->dayOfYear >= $dateOfBirth->dayOfYear - $extraDay;

        $age = [
            'years' => ($currentDateTime->year - $dateOfBirth->year - ($hasDobOccurred ? 0 : 1)),
        ];

        // Calculate months.
        if ($hasDobOccurred) {
            $age['months']  = $currentDateTime->month - $dateOfBirth->month;

            if ($age['months'] > 0 & $currentDateTime->day < $dateOfBirth->day) {
                --$age['months'];
            }
        } else {
            $age['months'] = self::MAX_MONTHS - 1 - abs($currentDateTime->month - $dateOfBirth->month);
        }

        // Calculate days.
        $currentMonth = $dateOfBirth->month + $age['months'];

        if ($currentMonth > self::MAX_MONTHS) {
            $currentMonth = abs($currentMonth - self::MAX_MONTHS);
        }

        if ($currentMonth === $currentDateTime->month) {
            $age['days'] = ($currentDateTime->day - ($dateOfBirth->day - $extraDay));
        } else {
            $age['days'] = (
                cal_days_in_month(CAL_GREGORIAN, $currentMonth, $dateOfBirth->year + $age['years']) -
                ($dateOfBirth->day - ($hasDobOccurred ? $extraDay : 0)) + $currentDateTime->day
            );
        }

        return $age;
    }

    /**
     * Demonstrate calculate age simple taking into account leap year.
     *
     * @return int
     */
    public function age(): int
    {
        $today = $this->getEndDate();
        $dob = $this->getDateOfBirth();

        $age = $today->year - $dob->year;

        if ($dob->toDate() > $today->addYears(-$age)) {
            $age--;
        }

        return $age;
    }

    /**
     * Demonstrate Carbon age calculation.
     *
     * @return int
     */
    public function CarbonAge(): int
    {
        return Carbon::parse($this->getDateOfBirth())->age;
    }

    /**
     * Demonstrate Carbon date difference in years.
     *
     * @return int
     */
    public function years(): int
    {
        return $this->getDateOfBirth()->diffInDays($this->getEndDate());
    }

    /**
     * Demonstrate Carbon date difference in months.
     *
     * @return int
     */
    public function months(): int
    {
        return $this->getDateOfBirth()->diffInMonths($this->getEndDate());
    }

    /**
     * Demonstrate Carbon date difference in days.
     *
     * @return int
     */
    public function days(): int
    {
        return $this->getDateOfBirth()->diffInDays($this->getEndDate());
    }

    /**
     * Demonstrate Carbon date difference in hours.
     *
     * @return int
     */
    public function hours(): int
    {
        return $this->getDateOfBirth()->diffInHours($this->getEndDate());
    }

    /**
     * Demonstrate Carbon date difference in seconds.
     *
     * @return int
     */
    public function minutes(): int
    {
        return $this->getDateOfBirth()->diffInMinutes($this->getEndDate());
    }

    /**
     * Demonstrate Carbon date difference in seconds.
     *
     * @return int
     */
    public function seconds(): int
    {
        return $this->getDateOfBirth()->diffInSeconds($this->getEndDate());
    }

    /**
     * Demonstrate Carbon's parsing a date diff in a string format.
     *
     * @return string
     */
    public function toHumanReadable(): string
    {
        $diff = $this->getDateOfBirth()->diff($this->getEndDate());

        if ($diff->h === 0) {
            return $diff->format('%y years, %m months, %d days old');
        }

        return $diff->format('%y years, %m months, %d days and %h hours old');
    }

    public function setDateOfBirth(string $date, string $format = self::DATE_FORMAT): self
    {
        $this->dataOfBirth = Carbon::createFromFormat($format, $date);

        return $this;
    }

    public function getDateOfBirth(): Carbon
    {
        return $this->dataOfBirth;
    }

    public function setEndDate(string $date, string $format = self::DATE_FORMAT): self
    {
        $this->endDate = Carbon::createFromFormat($format, $date);

        return $this;
    }

    public function getEndDate(): Carbon
    {
        return $this->endDate ?? Carbon::now();
    }
}

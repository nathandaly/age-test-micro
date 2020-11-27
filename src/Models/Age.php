<?php

namespace App\Models;

use JsonSerializable;

class Age implements JsonSerializable
{
    public int $years;

    public int $months;

    public int $days;

    public ?int $hours;

    public ?string $humanReadable;

    public function __construct(int $years, int $months, int $days, ?int $hours)
    {
        $this->years = $years;
        $this->months = $months;
        $this->days = $days;
        $this->hours = $hours;
    }

    public function jsonSerialize()
    {
        return (array) $this;
    }
}

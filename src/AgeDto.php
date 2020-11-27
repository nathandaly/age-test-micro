<?php

namespace App;

use JsonSerializable;

class AgeDto implements JsonSerializable
{
    public int $years;

    public int $months;

    public int $days;

    public ?int $hours;

    protected string $humanReadable;

    public function __construct(int $years, int $months, int $days, ?int $hours = null)
    {
        $this->years = $years;
        $this->months = $months;
        $this->days = $days;
        $this->hours = $hours;
    }

    public function setHumanReadable(string $humanReadable): self
    {
        $this->humanReadable = $humanReadable;

        return $this;
    }

    public function jsonSerialize()
    {
        return (array) $this;
    }

    public function __toString()
    {
        if ($this->humanReadable) {
            return $this->humanReadable;
        }

        if ($this->hours) {
            return $this->years. ' years, '
                . $this->months . ' months, '
                . $this->days . ' days and '
                . $this->hours . ' hours old';
        }

        return $this->years . ' years, '
            . $this->months . ' months, '
            . $this->days . ' days old';
    }
}

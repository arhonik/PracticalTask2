<?php

namespace app\domain\Booking\Entity\ValueObject;

class DateTimeOfMovie
{
    private string $date;
    private string $startTime;
    private string $endTime;

    public function __construct(string $date, string $startTime, string $endTime)
    {
        $this->date = $date;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getStartTime(): string
    {
        return $this->startTime;
    }

    public function getEndTime(): string
    {
        return $this->endTime;
    }
}
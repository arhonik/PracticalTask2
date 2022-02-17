<?php

namespace app\domain\Booking\Entity;

class movieSchedule
{
    private int $id;
    private string $date;
    private string $startTime;
    private string $endTime;

    public function __construct(int $id, string $date, string $startTime, string $endTime)
    {
        $this->id = $id;
        $this->date = $date;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}
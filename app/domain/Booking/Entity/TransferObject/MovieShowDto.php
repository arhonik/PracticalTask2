<?php

namespace App\Domain\Booking\Entity\TransferObject;

class MovieShowDto
{
    public int $title;
    public int $date;
    public int $startTime;

    public function load(?array $data)
    {
        if (!is_array($data)) {
            throw new \InvalidArgumentException('Error type');
        }

        $this->title = $data["title"];
        $this->date = $data["date"];
        $this->startTime = $data["startTime"];
    }
}
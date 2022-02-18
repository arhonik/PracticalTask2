<?php

namespace App\Domain\Booking\Entity\TransferObject;

class MovieShowDto
{
    public string $titleMovie;
    public string $date;
    public string $startTime;

    public function load(?array $data)
    {
        self::assertCanBeArray($data);

        $this->titleMovie = $data["titleMovie"];
        $this->date = $data["date"];
        $this->startTime = $data["startTime"];
    }

    private static function assertCanBeArray(?array $data)
    {
        if (!is_array($data)) {
            throw new \InvalidArgumentException('Error type');
        }
    }
}
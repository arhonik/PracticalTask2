<?php

namespace App\Domain\Booking\Entity\ValueObject;

use DateInterval;
use DateTimeInterface;

class MovieShowInfo
{
    private Movie $movie;
    private Schedule $schedule;
    private int $freePlace;

    public function __construct(Movie $movie, Schedule $schedule, int $freePlace)
    {
        $this->movie = $movie;
        $this->schedule = $schedule;
        $this->freePlace = $freePlace;
    }

    public function getTitle(): string
    {
        return $this->movie->getTitle();
    }

    public function getDuration(): DateInterval
    {
        return $this->movie->getDuration();
    }

    public function getStartAt(): DateTimeInterface
    {
        return $this->schedule->getStartAt();
    }

    public function getEndAt(): DateTimeInterface
    {
        return $this->schedule->getEndAt();
    }

    public function getFreePlace(): int
    {
        return $this->freePlace;
    }


}
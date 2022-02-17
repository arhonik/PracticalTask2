<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\ValueObject\Movie;
use App\Domain\Booking\Entity\ValueObject\Hall;

class MovieShow
{
    private int $id;
    private Movie $movie;
    private Schedule $schedule;
    private Hall $hall;

    public function __construct(
        int       $id,
        Movie     $movie,
        Schedule  $dateTimeOfMovie,
        Hall $hall
    ) {
        $this->id = $id;
        $this->movie = $movie;
        $this->schedule = $dateTimeOfMovie;
        $this->hall = $hall;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    public function getSchedule(): Schedule
    {
        return $this->schedule;
    }

    public function getHall(): Hall
    {
        return $this->hall;
    }

    public function checkIfFreePlaces(): bool
    {
        $freePlaces = $this->hall->getNumberOfPlaces() - $this->hall->getNumberOfTicket();
        if ($freePlaces > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function bookPlace()
    {
        $this->hall->setNumberOfTicket($this->hall->getNumberOfTicket() + 1);
    }
}
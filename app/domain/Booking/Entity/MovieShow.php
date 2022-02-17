<?php

namespace App\Domain\Booking\Entity;

use app\domain\Booking\Entity\ValueObject\Movie;
use App\Domain\Booking\Entity\ValueObject\MovieHall;

class MovieShow
{
    private int $id;
    private Movie $movie;
    private MovieSchedule $schedule;
    private MovieHall $hall;

    public function __construct(
        int           $id,
        Movie         $movie,
        MovieSchedule $dateTimeOfMovie,
        MovieHall $hall
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

    public function getSchedule(): MovieSchedule
    {
        return $this->schedule;
    }

    public function getHall(): MovieHall
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
        $this->numberOfTicket = $this->numberOfTicket + 1;
    }
}
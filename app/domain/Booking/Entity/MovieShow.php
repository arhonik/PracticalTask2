<?php

namespace App\Domain\Booking\Entity;

use app\domain\Booking\Entity\ValueObject\Movie;

class MovieShow
{
    private int $id;
    private Movie $movie;
    private MovieSchedule $schedule;
    private int $numberOfTicket;
    private int $numberOfPlaces;

    public function __construct(
        int           $id,
        Movie         $movie,
        MovieSchedule $dateTimeOfMovie,
        int           $numberOfTicket,
        int           $numberOfPlaces
    ) {
        $this->id = $id;
        $this->movie = $movie;
        $this->schedule = $dateTimeOfMovie;
        $this->numberOfTicket = $numberOfTicket;
        $this->numberOfPlaces = $numberOfPlaces;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    public function getDateTimeOfMovie(): MovieSchedule
    {
        return $this->dateTimeOfMovie;
    }

    public function checkIfFreePlaces(): bool
    {
        if (($this->numberOfPlaces - $this->numberOfTicket) > 0) {
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
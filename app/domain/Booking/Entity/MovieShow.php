<?php

namespace App\Domain\Booking\Entity;

use app\domain\Booking\Entity\ValueObject\DateTimeOfMovie;

class MovieShow
{
    private int $id;
    private Movie $movie;
    private DateTimeOfMovie $dateTimeOfMovie;
    private int $numberOfTicket;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    public function setMovie(Movie $movie): void
    {
        $this->movie = $movie;
    }

    public function getDateTimeOfMovie(): DateTimeOfMovie
    {
        return $this->dateTimeOfMovie;
    }

    public function setDateTimeOfMovie(DateTimeOfMovie $dateTimeOfMovie): void
    {
        $this->dateTimeOfMovie = $dateTimeOfMovie;
    }

    public function getNumberOfTicket(): int
    {
        return $this->numberOfTicket;
    }

    public function setNumberOfTicket(int $numberOfTicket): void
    {
        $this->numberOfTicket = $numberOfTicket;
    }
}
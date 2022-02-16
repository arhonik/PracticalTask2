<?php

namespace App\Domain\Booking\Entity;

use app\domain\Booking\Entity\ValueObject\DateTimeOfMovie;

class MovieShow
{
    private int $id;
    private Movie $movie;
    private DateTimeOfMovie $dateTimeOfMovie;
    private int $numberOfTicket;

    public function __construct(
        int $id,
        Movie $movie,
        DateTimeOfMovie $dateTimeOfMovie,
        int $numberOfTicket
    ) {
        $this->id = $id;
        $this->movie = $movie;
        $this->dateTimeOfMovie = $dateTimeOfMovie;
        $this->numberOfTicket = $numberOfTicket;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }
    
    public function getDateTimeOfMovie(): DateTimeOfMovie
    {
        return $this->dateTimeOfMovie;
    }

    public function getNumberOfTicket(): int
    {
        return $this->numberOfTicket;
    }
}
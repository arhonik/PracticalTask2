<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\TransferObject\MovieShowDto;

class MovieShow
{
    private int $id;
    private Movie $movie;
    private string $showDate;
    private string $startTime;
    private string $endTime;
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

    public function getShowDate(): string
    {
        return $this->showDate;
    }

    public function setShowDate(string $showDate): void
    {
        $this->showDate = $showDate;
    }

    public function getStartTime(): string
    {
        return $this->startTime;
    }

    public function setStartTime(string $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function getEndTime(): string
    {
        return $this->endTime;
    }

    public function setEndTime(string $endTime): void
    {
        $this->endTime = $endTime;
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
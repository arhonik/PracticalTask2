<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\TransferObject\MovieShowDto;

class MovieShow
{
    private int $id;
    private string $movieTitle;
    private string $showDate;
    private string $startTime;
    private string $endTime;
    private string $duration;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setMovieTitle(string $movieTitle): void
    {
        $this->movieTitle = $movieTitle;
    }

    public function getMovieTitle(): string
    {
        return $this->movieTitle;
    }

    public function setShowDate(string $showDate): void
    {
        $this->showDate = $showDate;
    }

    public function getShowDate(): string
    {
        return $this->showDate;
    }

    public function setStartTime(string $startTime): void
    {
        $this->startTime = $startTime;
    }

    public function getStartTime(): string
    {
        return $this->startTime;
    }

    public function setEndTime(string $endTime): void
    {
        $this->endTime = $endTime;
    }

    public function getEndTime(): string
    {
        return $this->endTime;
    }

    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }
}
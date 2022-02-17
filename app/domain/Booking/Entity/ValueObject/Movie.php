<?php

namespace App\Domain\Booking\Entity\TransferObject;

class Movie
{
    private string $title;
    private string $duration;

    public function __construct(string $title, string $duration)
    {
        $this->title = $title;
        $this->duration = $duration;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }
}
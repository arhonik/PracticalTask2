<?php

namespace App\Domain\Booking\Entity;

class Movie
{
    private int $id;
    private string $title;
    private string $duration;

    public function __construct(int $id, string $title, string $duration)
    {
        $this->id = $id;
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
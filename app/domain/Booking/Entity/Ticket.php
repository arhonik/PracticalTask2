<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\ValueObject\Client;

class Ticket
{
    private int $id;
    private Client $client;
    private string $movie;
    private string $date;
    private string $startTime;

    public function __construct(
        int $id,
        Client $client,
        string $movie,
        string $date,
        string $startTime
    ) {
        $this->id = $id;
        $this->client = $client;
        $this->movie = $movie;
        $this->date = $date;
        $this->startTime = $startTime;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function getMovie(): string
    {
        return $this->movie;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getStartTime(): string
    {
        return $this->startTime;
    }
}
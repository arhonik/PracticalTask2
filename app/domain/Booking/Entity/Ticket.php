<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\ValueObject\Client;

class Ticket
{
    private int $id;
    private Client $client;
    private string $movie;
    private string $date;
    private string $duration;

    public function __construct(
        int $id,
        Client $client,
        string $movie,
        string $date,
        string $duration
    ) {
        $this->id = $id;
        $this->client = $client;
        $this->movie = $movie;
        $this->date = $date;
        $this->duration = $duration;
    }
}
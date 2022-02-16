<?php

namespace App\Domain\Booking\Entity;

class Ticket
{
    private int $id;
    private string $clientName;
    private string $phoneClient;
    private string $film;
    private string $date;
    private string $duration;

    public function __construct()
    {
    }

}
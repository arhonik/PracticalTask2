<?php

namespace App\Domain\Booking\Entity\ValueObject;

class MovieHall
{
    private int $numberOfPlaces;
    private int $numberOfTicket;

    public function __construct(int $numberOfPlaces, int $numberOfTicket = 0)
    {
        $this->numberOfPlaces = $numberOfPlaces;
        $numberOfTicket = $numberOfTicket;
    }

    public function getNumberOfPlaces(): int
    {
        return $this->numberOfPlaces;
    }

    public function getNumberOfTicket(): int
    {
        return $this->numberOfTicket;
    }
}
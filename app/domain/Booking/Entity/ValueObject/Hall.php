<?php

namespace App\Domain\Booking\Entity\ValueObject;

class Hall
{
    private int $numberOfPlaces;
    private int $numberOfTicket = 0;

    public function __construct(int $numberOfPlaces)
    {
        $this->numberOfPlaces = $numberOfPlaces;
    }

    public function getNumberOfPlaces(): int
    {
        return $this->numberOfPlaces;
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
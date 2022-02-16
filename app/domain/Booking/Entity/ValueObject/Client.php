<?php

namespace App\Domain\Booking\Entity\ValueObject;

class Client
{
    private string $name;
    private string $phone;

    public function __construct(string $name, string $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }
}
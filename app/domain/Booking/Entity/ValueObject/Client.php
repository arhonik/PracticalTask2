<?php

namespace App\Domain\Booking\Entity\ValueObject;

use App\Domain\Booking\Entity\TransferObject\ClientDto;

class Client
{
    private string $name;
    private string $phone;

    public function __construct(string $name, string $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
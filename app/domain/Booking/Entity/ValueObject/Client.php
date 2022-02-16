<?php

namespace App\Domain\Booking\Entity\ValueObject;

use App\Domain\Booking\Entity\TransferObject\ClientDto;

class Client
{
    private string $name;
    private string $phone;

    public function fromDto(ClientDto $client)
    {
        $this->name = $client->name;
        $this->phone = $client->phone;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

}
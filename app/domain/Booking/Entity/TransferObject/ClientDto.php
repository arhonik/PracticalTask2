<?php

namespace App\Domain\Booking\Entity\TransferObject;

class ClientDto
{
    public string $name;
    public string $phone;

    public function load(?array $data)
    {
        if (!is_array($data)) {
            throw new \InvalidArgumentException('Error type');
        }

        $this->name = $data["name"];
        $this->phone = $data["phone"];
    }

}
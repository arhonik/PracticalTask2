<?php

namespace App\Domain\Booking\Entity\TransferObject;

class BookingDto
{
    private string $name;
    private string $phone;
    private int $movieShow;

    public function load(?array $data)
    {
        if (!is_array($data)) {
            throw new \InvalidArgumentException('Error type');
        }

        $this->name = $data["name"];
        $this->phone = $data["phone"];
        $this->movieShow = $data["movieShow"];
    }

}
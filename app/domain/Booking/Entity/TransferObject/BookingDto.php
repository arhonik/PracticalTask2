<?php

namespace App\Domain\Booking\Entity\TransferObject;

use http\Exception\InvalidArgumentException;

class BookingDto
{
    public string $name;
    public string $phone;
    public int $movieShow;

    public function load(array $data)
    {
        if (!is_array($data)) {
            throw new InvalidArgumentException();
        }

        $this->name = $data["name"];
        $this->phone = $data["phone"];
        $this->movieShow = $data["movieShow"];
    }

    public static function fromRequest($request)
    {
        return (new self())->load($request->post());
    }

}
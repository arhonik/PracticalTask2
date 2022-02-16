<?php

namespace App\Domain\Booking\Entity\TransferObject;

class MovieShowDto
{
    public int $id;

    public function load(?array $data)
    {
        if (!is_array($data)) {
            throw new \InvalidArgumentException('Error type');
        }

        $this->id = $data["movieShowId"];
    }
}
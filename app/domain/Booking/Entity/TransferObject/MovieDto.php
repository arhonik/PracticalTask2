<?php

namespace app\domain\Booking\Entity\TransferObject;

class MovieDto
{
    private string $id;

    public function load(?array $data)
    {
        if (!is_array($data)) {
            throw new \InvalidArgumentException('Error type');
        }

        $this->id = $data["movieId"];
    }
}
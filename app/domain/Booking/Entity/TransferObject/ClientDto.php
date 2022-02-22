<?php

namespace App\Domain\Booking\Entity\TransferObject;

use InvalidArgumentException;

class ClientDto
{
    public string $name;
    public string $phone;

    public function load(?array $data)
    {
        self::assertCanBeArray($data);

        $this->name = $data["name"];
        $this->phone = $data["phone"];
    }

    private static function assertCanBeArray(?array $data): void
    {
        if (!is_array($data)) {
            throw new InvalidArgumentException('Error type');
        }
    }
}
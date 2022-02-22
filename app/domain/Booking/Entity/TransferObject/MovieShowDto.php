<?php

namespace App\Domain\Booking\Entity\TransferObject;

use DateTimeImmutable;
use DateTimeZone;
use InvalidArgumentException;

class MovieShowDto
{
    public string $titleMovie;
    public string $startTime;

    public function load(?array $data)
    {
        self::assertCanBeArray($data);

        $this->titleMovie = $data["titleMovie"];
        $this->startTime = DateTimeImmutable::createFromFormat("Y-m-d H:i:s", $data["startTime"], new DateTimeZone("Europa/Moscow"));
    }

    private static function assertCanBeArray(?array $data)
    {
        if (!is_array($data)) {
            throw new InvalidArgumentException('Error type');
        }
    }


}
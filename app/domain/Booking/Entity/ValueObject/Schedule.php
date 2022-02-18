<?php

namespace App\Domain\Booking\Entity\ValueObject;

class Schedule
{
    private \DateTimeInterface $startAt;
    private \DateTimeInterface $endAt;

    public function __construct(string $startTime, string $endTime)
    {
        self::acceptCanBeConvertStringToDate($startTime);
        $this->startAt = new \DateTimeImmutable("$startTime", new \DateTimeZone("Europe/Moscow"));

        self::acceptCanBeConvertStringToDate($endTime);
        $this->endAt = new \DateTimeImmutable("$endTime", new \DateTimeZone("Europe/Moscow"));
    }

    private static function acceptCanBeConvertStringToDate(string $string)
    {
        if (!strtotime($string)) {
            throw new \DomainException('Can\'t convert string to date');
        }
    }

    public function getDate(): string
    {
        return $this->startAt->format("j F");
    }

    public function getStartAt(): string
    {
        return $this->startAt->format("H:i");
    }

    public function getEndAt(): string
    {
        return $this->endAt->format("H:i");
    }
}
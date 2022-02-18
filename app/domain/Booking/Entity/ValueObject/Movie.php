<?php

namespace App\Domain\Booking\Entity\ValueObject;

class Movie
{
    private string $title;
    private \DateInterval $duration;

    public function __construct(string $title, string $duration)
    {
        $this->title = $title;

        self::acceptCanBeConvertStringToTime($duration);
        $this->duration = \DateInterval::createFromDateString($duration);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDuration(): string
    {
        return $this->duration->format("%hч. %iмин.");
    }

    private static function acceptCanBeConvertStringToTime(string $string)
    {
        if (!strtotime($string)) {
            throw new \DomainException('Can\'t convert string to time');
        }
    }
}
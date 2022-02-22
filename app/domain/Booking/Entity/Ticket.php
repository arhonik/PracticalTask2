<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\ValueObject\Customer;

class Ticket
{
    private int $id;
    private Customer $customer;
    private string $movie;
    private \DateTimeInterface $startTime;

    public function __construct(
        int $id,
        Customer $customer,
        string $movie,
        \DateTimeInterface $startTime
    ) {
        $this->id = $id;
        $this->customer = $customer;
        $this->movie = $movie;
        $this->startTime = $startTime;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCustomerName(): string
    {
        return $this->customer->getName();
    }

    public function getCustomerPhone(): string
    {
        return $this->customer->getPhone();
    }

    public function getMovie(): string
    {
        return $this->movie;
    }

    public function getStartTime(): \DateTimeInterface
    {
        return $this->startTime;
    }
}
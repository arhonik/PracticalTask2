<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Collection\TicketsCollection;
use App\Domain\Booking\Entity\ValueObject\Movie;
use App\Domain\Booking\Entity\ValueObject\Hall;
use App\Domain\Booking\Entity\ValueObject\Schedule;

class MovieShow
{
    private int $id;
    private Movie $movie;
    private Schedulehedule $schedule;
    private Hall $hall;
    private TicketsCollection $ticketsCollection;

    public function __construct(
        int $id,
        Movie $movie,
        Schedule $dateTimeOfMovie,
        Hall $hall,
        TicketsCollection $ticketsCollection
    ) {
        $this->id = $id;
        $this->movie = $movie;
        $this->schedule = $dateTimeOfMovie;
        $this->hall = $hall;
        $this->ticketsCollection = $ticketsCollection;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    public function getSchedule(): Schedule
    {
        return $this->schedule;
    }

    public function getHall(): Hall
    {
        return $this->hall;
    }

    public function getTicketsCollection(): TicketsCollection
    {
        return $this->ticketsCollection;
    }

    public function checkIfFreePlaces(): bool
    {
        $freePlaces = $this->hall->getNumberOfPlaces() - $this->ticketsCollection->getCountItems();
        if ($freePlaces > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function bookPlace(Ticket $ticket)
    {
        $this->ticketsCollection->addItem($ticket);
    }
}
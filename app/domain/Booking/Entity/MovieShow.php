<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Collection\TicketsCollection;
use App\Domain\Booking\Entity\TransferObject\ClientDto;
use App\Domain\Booking\Entity\ValueObject\Client;
use App\Domain\Booking\Entity\ValueObject\Movie;
use App\Domain\Booking\Entity\ValueObject\Hall;
use App\Domain\Booking\Entity\ValueObject\Schedule;
use DomainException;
use Iterator;

class MovieShow
{
    private int $id;
    private Movie $movie;
    private Schedule $schedule;
    private Hall $hall;
    private TicketsCollection $ticketsCollection;

    public function __construct(
        int $id,
        Movie $movie,
        Schedule $schedule,
        Hall $hall
    ) {
        $this->id = $id;
        $this->movie = $movie;
        $this->schedule = $schedule;
        $this->hall = $hall;
        $this->ticketsCollection = new TicketsCollection();
    }

    public function bookPlace(ClientDto $client)
    {
        self::assertCanBeAddTicket($this->getTicketsCollection(), $this->hall->getNumberOfPlaces());

        $this->ticketsCollection->add(new Ticket(
            4,
            new Client(
                $client->name,
                $client->phone
            ),
            $this->getMovieTitle(),
            $this->schedule->getDate(),
            $this->schedule->getStartAt()
        ));
    }

    private static function assertCanBeAddTicket(TicketsCollection $ticketsCollection, int $numberOfPlaces)
    {
        if (!self::checkIfFreePlaces($ticketsCollection, $numberOfPlaces)) {
            throw new DomainException('No free places');
        }
    }

    private static function checkIfFreePlaces(TicketsCollection $ticketsCollection, int $numberOfPlaces): bool
    {
        $freePlaces = $numberOfPlaces - $ticketsCollection->count();
        return $freePlaces > 0;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMovieTitle(): string
    {
        return $this->movie->getTitle();
    }

    public function getMovieDuration(): string
    {
        return $this->movie->getDuration();
    }

    public function getScheduleDate(): string
    {
        return $this->schedule->getDate();
    }

    public function getScheduleStartAt(): string
    {
        return $this->schedule->getStartAt();
    }

    public function getScheduleEndAt(): string
    {
        return $this->schedule->getEndAt();
    }

    public function getNumberOfAvailablePlacesForBooking(): int
    {
        return $this->hall->getNumberOfPlaces() - $this->ticketsCollection->count();
    }

    private function getTicketsCollection(): TicketsCollection
    {
        return $this->ticketsCollection;
    }

    public function getTicketsCollectionIterator(): Iterator
    {
        return $this->ticketsCollection->getIterator();
    }
}
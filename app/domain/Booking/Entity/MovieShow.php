<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Collection\TicketsCollection;
use App\Domain\Booking\Entity\TransferObject\ClientDto;
use App\Domain\Booking\Entity\ValueObject\Customer;
use App\Domain\Booking\Entity\ValueObject\Movie;
use App\Domain\Booking\Entity\ValueObject\Hall;
use App\Domain\Booking\Entity\ValueObject\Schedule;
use DateTimeInterface;
use DomainException;
use Iterator;
use Symfony\Component\Uid\Uuid;

class MovieShow
{
    private Uuid $id;
    private Movie $movie;
    private Schedule $schedule;
    private Hall $hall;
    private TicketsCollection $ticketsCollection;

    public function __construct(
        Uuid $id,
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
            Uuid::v4(),
            new Customer(
                $client->name,
                $client->phone
            ),
            $this->getTitle(),
            $this->schedule->getStartAt(),
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

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->movie->getTitle();
    }

    public function getDuration(): string
    {
        return $this->movie->getDuration();
    }

    public function getStartAt(): DateTimeInterface
    {
        return $this->schedule->getStartAt();
    }

    public function getEndAt(): DateTimeInterface
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
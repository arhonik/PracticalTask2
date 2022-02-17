<?php

namespace App\Domain\Helpers;

use App\Domain\Booking\Collection\TicketsCollection;
use App\Domain\Booking\Entity\ValueObject\Schedule;
use App\Domain\Booking\Entity\MovieShow;
use App\Domain\Booking\Entity\TransferObject\MovieShowDto;
use App\Domain\Booking\Entity\ValueObject\Movie;
use App\Domain\Booking\Entity\ValueObject\Hall;

class MovieShowRepository implements MovieShowRepositoryInterface
{
    public function findById(int $id): ?MovieShow
    {
        // TODO: Implement findById() method.
        $ticketsCollection = new TicketsCollection();
        $movieShow = new MovieShow(
            1,
            new Movie(
                "Venom 2",
                "1ч 25м"
            ),
            new Schedule(
                "10 октября",
                "19:45",
                "21:10"
            ),
            new Hall(
                100
            ),
            $ticketsCollection
        );
        return $movieShow;
    }

    public function findByTitleMovieAndSchedule(MovieShowDto $movieShowDto)
    {
        // TODO: Implement findByTitleMovieAndSchedule() method.
        $ticket1 = new \App\Domain\Booking\Entity\Ticket(
            1,
            new \App\Domain\Booking\Entity\ValueObject\Client(
                "John",
                "+79027869474"
            ),
            "Venom 2",
            "10 октября",
            "1ч 25м"
        );
        $ticket2 = new \App\Domain\Booking\Entity\Ticket(
            2,
            new \App\Domain\Booking\Entity\ValueObject\Client(
                "Michael",
                "+79021879474"
            ),
            "Venom 2",
            "10",
            "1ч 25м"
        );
        $ticket3 = new \App\Domain\Booking\Entity\Ticket(
            3,
            new \App\Domain\Booking\Entity\ValueObject\Client(
                "Kirill",
                "+79094869474"
            ),
            "Venom 2",
            "10 октября",
            "1ч 25м"
        );
        $ticketsCollection = new TicketsCollection();
        $ticketsCollection->addItem($ticket1);
        $ticketsCollection->addItem($ticket2);
        $ticketsCollection->addItem($ticket3);
        $movieShow = new MovieShow(
            1,
            new Movie(
                "Venom 2",
                "1ч 25м"
            ),
            new Schedule(
                "10 октября",
                "19:45",
                "21:10"
            ),
            new Hall(
                100
            ),
            $ticketsCollection
        );
        return $movieShow;
    }

    public function save(MovieShow $movieShow)
    {
        // TODO: Implement save() method.
    }
}
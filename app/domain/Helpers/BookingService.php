<?php

namespace App\Domain\Helpers;

use App\Domain\Booking\Entity\MovieShow;
use App\Domain\Booking\Entity\Ticket;
use App\Domain\Booking\Entity\ValueObject\Client;

class BookingService
{
    public function createTicket(MovieShow $movieShow, Client $client)
    {
        if (!$movieShow->checkIfFreePlaces()) {
            throw new \Exception();
        }

        $ticket = new Ticket(
            1,
            $client,
            $movieShow->getSchedule()->getDate(),
            $movieShow->getMovie()->getTitle(),
            $movieShow->getMovie()->getDuration()
        );
        $bookingRepository = new BookingRepository();
        $bookingRepository->save($ticket);
        $movieShow->bookPlace();
    }
}
<?php

namespace App\Domain\Helpers;

use App\Domain\Booking\Entity\MovieShow;
use App\Domain\Booking\Entity\Ticket;
use App\Domain\Booking\Entity\ValueObject\Client;

class MovieShowService
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
        $movieShow->bookPlace($ticket);
    }
}
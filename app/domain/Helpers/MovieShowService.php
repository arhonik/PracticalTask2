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

        $schedule = $movieShow->getSchedule();
        $movie = $movieShow->getMovie();
        $ticket = new Ticket(
            4,
            $movieShow->getId(),
            $client,
            $schedule->getDate(),
            $movie->getTitle(),
            $schedule->getStartTime()
        );
        $movieShow->bookPlace($ticket);
    }
}
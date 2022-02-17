<?php

namespace App\Domain\Helpers;

use App\Domain\Booking\Entity\Schedule;
use App\Domain\Booking\Entity\MovieShow;
use App\Domain\Booking\Entity\TransferObject\MovieShowDto;
use App\Domain\Booking\Entity\ValueObject\Movie;
use App\Domain\Booking\Entity\ValueObject\Hall;

class MovieShowRepository implements MovieShowRepositoryInterface
{
    public function findById(int $id): ?MovieShow
    {
        // TODO: Implement findById() method.
        $movieShow = new MovieShow(
            1,
            new Movie(
                "Venom 2",
                "1ч 25м"
            ),
            new Schedule(
                1,
                "10 октября",
                "19:45",
                "21:10"
            ),
            new Hall(
                100
            )
        );
        $movieShow->getHall()->setNumberOfTicket(5);
        return $movieShow;
    }

    public function findByTitleMovieAndSchedule(MovieShowDto $movieShowDto)
    {
        // TODO: Implement findByTitleMovieAndSchedule() method.
        $movieShow = new MovieShow(
            1,
            new Movie(
                "Venom 2",
                "1ч 25м"
            ),
            new Schedule(
                1,
                "10 октября",
                "19:45",
                "21:10"
            ),
            new Hall(
                100
            )
        );
        $movieShow->getHall()->setNumberOfTicket(5);
        return $movieShow;
    }

    public function save(MovieShow $movieShow)
    {
        // TODO: Implement save() method.
    }
}
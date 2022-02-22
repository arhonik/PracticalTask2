<?php

namespace App\Domain\Helpers;

use App\Domain\Booking\Collection\MovieShowCollection;
use App\Domain\Booking\Entity\ValueObject\Schedule;
use App\Domain\Booking\Entity\MovieShow;
use App\Domain\Booking\Entity\TransferObject\MovieShowDto;
use App\Domain\Booking\Entity\ValueObject\Movie;
use App\Domain\Booking\Entity\ValueObject\Hall;

class MovieShowRepository implements MovieShowRepositoryInterface
{
    public function findAllActive(): MovieShowCollection
    {
        // TODO: Implement findAll() method.
        return new MovieShowCollection();
    }

    public function findById(int $id): MovieShow
    {
        // TODO: Implement findById() method.
        return new MovieShow(
            1,
            new Movie(
                "Venom 2",
                "1 hour 25 minutes"
            ),
            new Schedule(
                "10 October 2022 19:45",
                "10 October 2022 21:10",
            ),
            new Hall(
                100
            )
        );
    }

    public function findByTitleMovieAndSchedule(MovieShowDto $movieShowDto): MovieShow
    {
        // TODO: Implement findByTitleMovieAndSchedule() method.
        return new MovieShow(
            1,
            new Movie(
                "Venom 2",
                "1 hour 25 minutes"
            ),
            new Schedule(
                "10 October 2022 19:45",
                "10 October 2022 21:10",
            ),
            new Hall(
                100
            )
        );
    }

    public function save(MovieShow $movieShow)
    {
        // TODO: Implement save() method.
    }
}
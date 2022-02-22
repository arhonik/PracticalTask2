<?php

namespace App\Domain\Helpers;

use App\Domain\Booking\Collection\MovieShowCollection;
use App\Domain\Booking\Entity\ValueObject\Schedule;
use App\Domain\Booking\Entity\MovieShow;
use App\Domain\Booking\Entity\TransferObject\MovieShowDto;
use App\Domain\Booking\Entity\ValueObject\Movie;
use App\Domain\Booking\Entity\ValueObject\Hall;
use DateTimeImmutable;
use DateTimeZone;
use Symfony\Component\Uid\Uuid;

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
            Uuid::v4(),
            new Movie(
                "Venom 2",
                "1 hour 25 minutes"
            ),
            new Schedule(
                DateTimeImmutable::createFromFormat(
                    "Y-m-d H:i",
                    "2022-10-10 19:45",
                    new DateTimeZone("Europe/Moscow")
                ),
                DateTimeImmutable::createFromFormat(
                    "Y-m-d H:i",
                    "2022-10-10 21:10",
                    new DateTimeZone("Europe/Moscow")
                ),
            ),
            new Hall(
                100
            )
        );
    }

    public function findByTitleMovieAndSchedule(MovieShowDto $movieShowDto): MovieShow
    {
        // TODO: Implement findByTitleMovieAndSchedule() method.
        var_dump(new Schedule(
            DateTimeImmutable::createFromFormat(
                "Y-m-d H:i",
                "2022-10-10 19:45",
                new DateTimeZone("Europe/Moscow")
            ),
            DateTimeImmutable::createFromFormat(
                "Y-m-d H:i",
                "2022-10-10 21:10",
                new DateTimeZone("Europe/Moscow")
            )
        ));
        return new MovieShow(
            Uuid::v4(),
            new Movie(
                "Venom 2",
                "1 hour 25 minutes"
            ),
            new Schedule(
                DateTimeImmutable::createFromFormat(
                    "Y-m-d H:i",
                    "2022-10-10 19:45",
                    new DateTimeZone("Europe/Moscow")
                ),
                DateTimeImmutable::createFromFormat(
                    "Y-m-d H:i",
                    "2022-10-10 21:10",
                    new DateTimeZone("Europe/Moscow")
                ),
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
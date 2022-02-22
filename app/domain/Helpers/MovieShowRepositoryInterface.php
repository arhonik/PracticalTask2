<?php

namespace App\Domain\Helpers;

use App\Domain\Booking\Collection\MovieShowCollection;
use App\Domain\Booking\Entity\MovieShow;
use App\Domain\Booking\Entity\TransferObject\MovieShowDto;

interface MovieShowRepositoryInterface
{
    public function findAllActive(): MovieShowCollection;

    public function findById(int $id): MovieShow;

    public function findByTitleMovieAndSchedule(MovieShowDto $movieShowDto): MovieShow;

    public function save(MovieShow $movieShow): void;
}
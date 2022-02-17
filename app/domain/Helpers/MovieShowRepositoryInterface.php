<?php

namespace App\Domain\Helpers;

use App\Domain\Booking\Entity\MovieShow;
use App\Domain\Booking\Entity\TransferObject\MovieShowDto;

interface MovieShowRepositoryInterface
{
    public function findById(int $id);

    public function findByTitleMovieAndSchedule(MovieShowDto $movieShowDto);

    public function save(MovieShow $movieShow);
}
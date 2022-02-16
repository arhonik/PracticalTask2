<?php

namespace App\Domain\Booking\Entity;

use App\Domain\Booking\Entity\TransferObject\MovieShowDto;

class MovieShow
{
    private int $id;
    private string $movieTitle;
    private string $showDate;
    private string $startTime;
    private string $endTime;
    private string $duration;

    public function fromDto(MovieShowDto $movieShowDto)
    {

    }
}
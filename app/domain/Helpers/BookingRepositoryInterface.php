<?php

namespace App\Domain\Helpers;

use App\Domain\Booking\Entity\Ticket;

interface BookingRepositoryInterface
{
    public function findById(int $id);

    public function save(Ticket $movieShow);
}
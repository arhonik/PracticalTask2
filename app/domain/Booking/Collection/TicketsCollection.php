<?php

namespace App\Domain\Booking\Collection;

use App\Domain\Helpers\TicketsIterator;

class TicketsCollection
{
    private $tickets = [];

    public function getItems()
    {
        return $this->tickets;
    }

    public function addItem($item)
    {
        $this->tickets[] = $item;
    }

    public function getCountItems(): int
    {
        return count($this->tickets);
    }

    public function getIterator(): \Iterator
    {
        return new TicketsIterator($this);
    }

    public function getReverseIterator(): \Iterator
    {
        return new TicketsIterator($this, true);
    }

}
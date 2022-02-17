<?php

namespace App\Domain\Helpers;

use App\Domain\Booking\Entity\Ticket;

class TicketsIterator implements \Iterator
{
    private TicketsCollection $collection;
    private int $position = 0;
    private bool $reverse = false;

    public function __construct(TicketsCollection $collection, $reverse = false)
    {
        $this->collection = $collection;
        $this->reverse = $reverse;
    }

    public function rewind()
    {
        $this->position = $this->reverse ?
            count($this->collection->getItems()) - 1 : 0;
    }

    public function current(): Ticket
    {
        return $this->collection->getItems()[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next()
    {
        $this->position = $this->position + ($this->reverse ? -1 : 1);
    }

    public function valid(): bool
    {
        return isset($this->collection->getItems()[$this->position]);
    }

}
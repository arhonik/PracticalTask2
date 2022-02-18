<?php

namespace App\Domain\Booking\Collection;

use App\Domain\Booking\Entity\MovieShow;

class MovieShowCollection implements \Countable
{
    private $movieShow = [];

    public function get()
    {
        return $this->movieShow;
    }

    public function add(MovieShow $movieShow)
    {
        $this->movieShow[] = $movieShow;
    }

    public function count(): int
    {
        return count($this->movieShow);
    }

    public function getIterator(): \Iterator
    {
        return new MovieShowIterator($this);
    }

    public function getReverseIterator(): \Iterator
    {
        return new MovieShowIterator($this, true);
    }

}
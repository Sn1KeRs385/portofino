<?php

declare(strict_types=1);

namespace Portofino\Row;

use Portofino\Cell;
use Portofino\Row;

class DefaultRow implements Row
{
    private $cells;

    public function __construct(Cell ...$cells)
    {
        $this->cells = $cells;
    }

    public function value(): iterable
    {
        return $this->cells;
    }
}
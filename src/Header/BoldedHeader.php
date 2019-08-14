<?php

declare(strict_types=1);

namespace Portofino\Header;

use Portofino\Cell;
use Portofino\Header;
use Portofino\Cell\BoldedCell;

class BoldedHeader implements Header
{
    private $cells;

    public function __construct(Cell ...$cells)
    {
        $this->cells = $cells;
    }

    public function value(): iterable
    {
        return
            array_map(
                function (Cell $cell) {
                    return new BoldedCell($cell);
                },
                $this->cells
            );
    }
}
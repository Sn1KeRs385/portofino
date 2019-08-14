<?php

declare(strict_types=1);

namespace Portofino\Row;

use Portofino\Cell;
use Portofino\Cell\BoldedCell;
use Portofino\Row;

class BoldedRow implements Row
{
    private $row;

    public function __construct(Row $row)
    {
        $this->row = $row;
    }

    public function value(): iterable
    {
        return
            array_map(
                function (Cell $cell) {
                    return new BoldedCell($cell);
                },
                $this->row->value()
            );
    }
}
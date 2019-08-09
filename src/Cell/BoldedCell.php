<?php

declare(strict_types=1);

namespace Portofino\Cell;

use Portofino\Cell;

class BoldedCell implements Cell
{
    private $cell;

    public function __construct(Cell $cell)
    {
        $this->cell = $cell;
    }

    public function value()
    {
        return $this->cell->value();
    }

    public function styles(): array
    {
        return
            array_merge(
                $this->cell->styles(),
                ['font-weight' => 'bold']
            );
    }
}
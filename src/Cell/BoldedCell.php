<?php

declare(strict_types=1);

namespace Portofino\Cell;

use Portofino\Cell;
use Portofino\Style;
use Portofino\Style\Merged;
use Portofino\Style\FontBold;

class BoldedCell implements Cell
{
    private $cell;

    public function __construct(Cell $cell)
    {
        $this->cell = $cell;
    }

    public function contents(): string
    {
        return $this->cell->contents();
    }

    public function style(): Style
    {
        return
            new Merged(
                $this->cell->style(),
                new FontBold()
            );
    }
}
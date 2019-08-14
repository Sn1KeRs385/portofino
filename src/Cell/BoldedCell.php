<?php

declare(strict_types=1);

namespace Portofino\Cell;

use Portofino\Cell;
use Portofino\Style;
use Portofino\Style\WithBoldedFont;

class BoldedCell implements Cell
{
    private $cell;

    public function __construct(Cell $cell)
    {
        $this->cell = $cell;
    }

    public function content(): Content
    {
        return $this->cell->content();
    }

    public function style(): Style
    {
        return
            new WithBoldedFont($this->cell->style());
    }
}
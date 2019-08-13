<?php

declare(strict_types=1);

namespace Portofino\Cell;

use Portofino\Cell;
use Portofino\Style;
use Portofino\Style\Color;
use Portofino\Style\WithColoredBackground;

class ColoredBackground implements Cell
{
    private $color;
    private $cell;

    public function __construct(Color $color, Cell $cell)
    {
        $this->color = $color;
        $this->cell = $cell;
    }

    public function content(): Content
    {
        return
            $this->cell->content();
    }

    public function style(): Style
    {
        return
            new WithColoredBackground(
                $this->color,
                $this->cell->style()
            );
    }
}
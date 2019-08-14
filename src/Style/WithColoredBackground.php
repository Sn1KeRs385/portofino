<?php

declare(strict_types=1);

namespace Portofino\Style;

use Portofino\Style;
use Portofino\Style\Background\ColoredBackground;

class WithColoredBackground implements Style
{
    private $color;
    private $style;

    public function __construct(Color $color, Style $style)
    {
        $this->color = $color;
        $this->style = $style;
    }

    public function font(): Font
    {
        return $this->style->font();
    }

    public function background(): Background
    {
        return
            new ColoredBackground(
                $this->color,
                $this->style->background()
            );
    }

    public function width(): Width
    {
        return $this->style->width();
    }
}
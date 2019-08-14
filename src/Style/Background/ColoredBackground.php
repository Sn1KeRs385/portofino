<?php

declare(strict_types=1);

namespace Portofino\Style\Background;

use Portofino\Style\Background;
use Portofino\Style\Color;

class ColoredBackground implements Background
{
    private $color;
    private $background;

    public function __construct(Color $color, Background $background)
    {
        $this->color = $color;
        $this->background = $background;
    }

    public function color(): Color
    {
        return $this->color;
    }
}
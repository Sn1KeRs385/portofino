<?php

declare(strict_types=1);

namespace Portofino\Style\Font;

use Portofino\Style\Color;
use Portofino\Style\Font;

class Colored implements Font
{
    private $color;
    private $font;

    public function __construct(Color $color, Font $font)
    {
        $this->color = $color;
        $this->font = $font;
    }

    public function isBold(): bool
    {
        return $this->font->isBold();
    }

    public function color(): Color
    {
        return $this->color;
    }
}
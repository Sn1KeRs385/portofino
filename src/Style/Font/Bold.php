<?php

declare(strict_types=1);

namespace Portofino\Style\Font;

use Portofino\Style\Color;
use Portofino\Style\Font;

class Bold implements Font
{
    private $font;

    public function __construct(Font $font)
    {
        $this->font = $font;
    }

    public function isBold(): bool
    {
        return true;
    }

    public function color(): Color
    {
        return $this->font->color();
    }
}
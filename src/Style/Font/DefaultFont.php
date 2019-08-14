<?php

declare(strict_types=1);

namespace Portofino\Style\Font;

use Portofino\Style\Color;
use Portofino\Style\Font;
use Portofino\Style\Color\DefaultFontColor;

class DefaultFont implements Font
{
    public function isBold(): bool
    {
        return false;
    }

    public function color(): Color
    {
        return new DefaultFontColor();
    }
}
<?php

declare(strict_types=1);

namespace Portofino\Style;

use Portofino\Style;
use Portofino\Style\Font\DefaultFont;
use Portofino\Style\Color\DefaultBackgroundColor;

class Plain implements Style
{
    public function font(): Font
    {
        return new DefaultFont();
    }

    public function backgroundColor(): Color
    {
        return new DefaultBackgroundColor();
    }

    public function autoSized(): bool
    {
        return false;
    }
}
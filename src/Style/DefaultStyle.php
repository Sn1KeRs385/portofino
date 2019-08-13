<?php

declare(strict_types=1);

namespace Portofino\Style;

use Portofino\Style;
use Portofino\Style\Font\DefaultFont;
use Portofino\Style\Background\DefaultBackground;
use Portofino\Style\Width\DefaultWidth;

class DefaultStyle implements Style
{
    public function font(): Font
    {
        return new DefaultFont();
    }

    public function background(): Background
    {
        return new DefaultBackground();
    }

    public function width(): Width
    {
        return new DefaultWidth();
    }
}
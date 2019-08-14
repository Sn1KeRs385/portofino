<?php

declare(strict_types=1);

namespace Portofino\Style\Background;

use Portofino\Style\Background;
use Portofino\Style\Color;
use Portofino\Style\Color\DefaultBackgroundColor;

class DefaultBackground implements Background
{
    public function color(): Color
    {
        return new DefaultBackgroundColor();
    }
}
<?php

declare(strict_types=1);

namespace Portofino\Style;

use Portofino\Style;
use Portofino\Style\Font\Bold;

class WithBoldedFont implements Style
{
    private $style;

    public function __construct(Style $style)
    {
        $this->style = $style;
    }

    public function font(): Font
    {
        return
            new Bold(
                $this->style->font()
            );
    }

    public function background(): Background
    {
        return
            $this->style->background();
    }

    public function width(): Width
    {
        return
            $this->style->width();
    }
}
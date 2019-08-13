<?php

declare(strict_types=1);

namespace Portofino\Style;

use Portofino\Style;

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

    public function backgroundColor(): Color
    {
        return $this->color;
    }

    public function autoSized(): bool
    {
        return $this->style->autoSized();
    }
}
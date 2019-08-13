<?php

declare(strict_types=1);

namespace Portofino\Style;

use Portofino\Style;
use Portofino\Style\Width\AutoSized;

class WithAutoSizing implements Style
{
    private $style;

    public function __construct(Style $style)
    {
        $this->style = $style;
    }

    public function font(): Font
    {
        return $this->style->font();
    }

    public function background(): Background
    {
        return $this->style->background();
    }

    public function width(): Width
    {
        return new AutoSized();
    }
}
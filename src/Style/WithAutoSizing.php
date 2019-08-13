<?php

declare(strict_types=1);

namespace Portofino\Style;

use Portofino\Style;

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

    public function backgroundColor(): Color
    {
        return $this->style->backgroundColor();
    }

    public function autoSized(): bool
    {
        return true;
    }
}
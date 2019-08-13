<?php

declare(strict_types=1);

namespace Portofino\Style;

use Portofino\Style;

class Merged implements Style
{
    private $originalStyle;
    private $newStyle;

    public function __construct(Style $originalStyle, Style $newStyle)
    {
        $this->originalStyle = $originalStyle;
        $this->newStyle = $newStyle;
    }

    public function backgroundColor(): Color
    {
        return $this->newStyle->backgroundColor();
    }

    public function font(): Font
    {
        return
            $this->newStyle->font();
    }

    public function autoSized(): bool
    {
        return
            $this->originalStyle->autoSized()
            ||
            $this->newStyle->autoSized();
    }
}
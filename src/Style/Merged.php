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

    public function fontBold(): bool
    {
        return
            $this->originalStyle->fontBold()
            ||
            $this->newStyle->fontBold();
    }

    public function linked(): bool
    {
        return
            $this->originalStyle->linked()
            ||
            $this->newStyle->linked();
    }

    public function url(): string
    {
        return
            $this->newStyle->url() ?? $this->originalStyle->url();
    }
}
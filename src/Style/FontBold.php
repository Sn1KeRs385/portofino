<?php

declare(strict_types=1);

namespace Portofino\Style;

use Portofino\Style;

class FontBold implements Style
{
    public function fontBold(): bool
    {
        return true;
    }

    public function linked(): bool
    {
        return false;
    }

    public function url(): string
    {
        return '';
    }
}
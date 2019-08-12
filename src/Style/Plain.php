<?php

declare(strict_types=1);

namespace Portofino\Style;

use Portofino\Style;

class Plain implements Style
{
    public function fontBold(): bool
    {
        return false;
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
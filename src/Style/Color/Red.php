<?php

declare(strict_types=1);

namespace Portofino\Style\Color;

use Portofino\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Color as PhpSpreadsheetColor;

class Red implements Color
{
    public function value(): string
    {
        return PhpSpreadsheetColor::COLOR_RED;
    }

    public function isSet(): bool
    {
        return true;
    }
}
<?php

declare(strict_types=1);

namespace Portofino\Payload;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Portofino\Payload;

class EmptySheet implements Payload
{
    public function value(): Spreadsheet
    {
        return new Spreadsheet();
    }
}
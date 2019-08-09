<?php

declare(strict_types=1);

namespace Portofino;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

interface Payload
{
    public function value(): Spreadsheet;
}
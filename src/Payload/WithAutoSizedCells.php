<?php

declare(strict_types=1);

namespace Portofino\Payload;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class WithAutoSizedCells
{
    public function value(): Spreadsheet
    {
        $spreadsheet = $this->payload->value();

        $sheet = $spreadsheet->getActiveSheet();

        $cellIterator =
            $sheet
                ->getRowIterator()
                ->current()
                ->getCellIterator();

        $cellIterator->setIterateOnlyExistingCells(true);

        /** @var Cell $cell */
        foreach ($cellIterator as $cell) {
            $sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
        }

        return $spreadsheet;
    }
}
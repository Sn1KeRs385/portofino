<?php

declare(strict_types=1);

namespace Portofino\Payload;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Portofino\Payload;

class WithAutoSizedCells implements Payload
{
    private $payload;

    public function __construct(Payload $payload)
    {
        $this->payload = $payload;
    }

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
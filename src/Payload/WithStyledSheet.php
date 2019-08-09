<?php

declare(strict_types=1);

namespace Portofino\Payload;

use PhpOffice\PhpSpreadsheet\Cell\Hyperlink;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Portofino\Cell;
use Portofino\Payload;
use Portofino\Sheet;

class WithStyledSheet implements Payload
{
    private $payload;
    private $sheet;

    public function __construct(Payload $payload, Sheet $sheet)
    {
        $this->payload = $payload;
        $this->sheet = $sheet;
    }

    public function value(): Spreadsheet
    {
        $spreadsheet = $this->payload->value();

        $activeSheet = $spreadsheet->getActiveSheet();

        $activeSheet->setTitle($this->sheet->name());

        $namedColumn = range('A', 'Z');

        $rowNumber = 1;

        /** @var array $row */
        foreach ($this->sheet->value() as $row) {
            $columnNumber = 0;
            /** @var Cell $cell */
            foreach ($row as $cell) {
                $coordinate = $namedColumn[$columnNumber] . $rowNumber;

                $activeCell =
                    $activeSheet
                        ->getCell($coordinate)
                        ->setValue($cell->value());

                if (isset($cell->styles()['url'])) {
                    $activeCell->setHyperlink(new Hyperlink($cell->styles()['url']));
                }

                if (isset($cell->styles()['font-weight']) && $cell->styles()['font-weight'] == 'bold') {
                    $activeCell
                        ->getStyle($coordinate)
                        ->applyFromArray(['font' => ['bold' => true]]);
                }

                $columnNumber++;
            }
            $rowNumber++;
        }

        return $spreadsheet;
    }
}
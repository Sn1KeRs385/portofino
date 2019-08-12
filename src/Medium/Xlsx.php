<?php

declare(strict_types=1);

namespace Portofino\Medium;

use PhpOffice\PhpSpreadsheet\Cell\Hyperlink;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Portofino\Cell;
use Portofino\Medium;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

class Xlsx implements Medium
{
    private $spreadsheet;

    public function __construct()
    {
        $this->spreadsheet = new Spreadsheet();
    }

    public function contents(string $name, array $cells): string
    {
        $activeSheet = $this->spreadsheet->getActiveSheet();

        $activeSheet->setTitle($name);

        $namedColumn = range('A', 'Z');

        $rowNumber = 1;

        /** @var array $row */
        foreach ($cells as $row) {
            $columnNumber = 0;
            /** @var Cell $cell */
            foreach ($row as $cell) {
                $coordinate = $namedColumn[$columnNumber] . $rowNumber;

                $activeCell =
                    $activeSheet
                        ->getCell($coordinate)
                        ->setValue($cell->contents());

                if ($cell->style()->linked()) {
                    $activeCell->setHyperlink(new Hyperlink($cell->style()->url()));
                }

                if ($cell->style()->fontBold()) {
                    $activeCell
                        ->getStyle($coordinate)
                        ->applyFromArray(['font' => ['bold' => true]]);
                }

                $columnNumber++;
            }
            $rowNumber++;
        }

        ob_start();
        (new XlsxWriter($this->spreadsheet))
            ->save('php://output');
        $data = ob_get_contents();
        ob_end_clean();

        return $data;
    }
}
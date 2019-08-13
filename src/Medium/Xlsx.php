<?php

declare(strict_types=1);

namespace Portofino\Medium;

use PhpOffice\PhpSpreadsheet\Cell\Hyperlink;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Portofino\Cell;
use Portofino\Medium;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use Portofino\Sheet;

class Xlsx implements Medium
{
    private $spreadsheet;

    public function __construct()
    {
        $this->spreadsheet = new Spreadsheet();
    }

    public function contents(Sheet $sheet): string
    {
        $activeSheet = $this->spreadsheet->getActiveSheet();

        $activeSheet->setTitle($sheet->name());

        $namedColumn = range('A', 'Z');

        $rowNumber = 1;

        /** @var array $row */
        foreach ($sheet->value() as $row) {
            $columnNumber = 0;
            /** @var Cell $cell */
            foreach ($row as $cell) {
                $coordinate = $namedColumn[$columnNumber] . $rowNumber;

                $activeCell =
                    $activeSheet
                        ->getCell($coordinate)
                        ->setValue($cell->content()->value());

                if ($cell->content()->isLink()) {
                    $activeCell->setHyperlink(new Hyperlink($cell->content()->url()));
                }

                if ($cell->style()->font()->isBold()) {
                    $activeCell
                        ->getStyle($coordinate)
                        ->applyFromArray(['font' => ['bold' => true]]);
                }

                if ($cell->style()->autoSized()) {
                    $activeSheet
                        ->getColumnDimension($activeCell->getColumn())
                        ->setAutoSize(true);
                }

                if ($cell->style()->font()->color()->isSet()) {
                    $activeCell
                        ->getStyle($coordinate)
                        ->getFont()
                        ->setColor(new Color($cell->style()->font()->color()->value()));
                }

                if ($cell->style()->backgroundColor()->isSet()) {
                    $activeCell
                        ->getStyle()
                        ->getFill()
                        ->setFillType(Fill::FILL_SOLID);

                    $activeCell
                        ->getStyle($coordinate)
                        ->getFill()
                        ->getStartColor()
                        ->setARGB($cell->style()->backgroundColor()->value());
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
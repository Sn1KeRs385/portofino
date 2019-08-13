<?php

declare(strict_types=1);

namespace Portofino\FileContents;

use PhpOffice\PhpSpreadsheet\Cell\Hyperlink;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use Portofino\Cell;
use Portofino\FileContents;
use Portofino\Sheet;

class Xlsx implements FileContents
{
    private $spreadsheet;
    private $sheet;

    public function __construct(Sheet $sheet)
    {
        $this->spreadsheet = new Spreadsheet();
        $this->sheet = $sheet;
    }

    public function value(): string
    {
        $activeSheet = $this->spreadsheet->getActiveSheet();

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
                        ->setValue($cell->content()->value());

                if ($cell->content()->isLink()) {
                    $activeCell->setHyperlink(new Hyperlink($cell->content()->url()->value()));
                }

                if ($cell->style()->font()->isBold()) {
                    $activeCell
                        ->getStyle($coordinate)
                        ->applyFromArray(['font' => ['bold' => true]]);
                }

                if ($cell->style()->width()->isAutoSized()) {
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

                if ($cell->style()->background()->color()->isSet()) {
                    $activeCell
                        ->getStyle()
                        ->getFill()
                        ->setFillType(Fill::FILL_SOLID);

                    $activeCell
                        ->getStyle($coordinate)
                        ->getFill()
                        ->getStartColor()
                        ->setARGB($cell->style()->background()->color()->value());
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
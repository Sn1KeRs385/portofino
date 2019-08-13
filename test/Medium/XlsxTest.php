<?php

declare(strict_types=1);

namespace Portofino\Tests\Export;

use PHPUnit\Framework\TestCase;
use Portofino\Cell\BoldedCell;
use Portofino\Cell\ColoredBackground;
use Portofino\Cell\ColoredFont;
use Portofino\Cell\LinkedCell;
use Portofino\Cell\StringCell;
use Portofino\Header\BoldedHeader;
use Portofino\Medium\Xlsx;
use Portofino\Row\BoldedRow;
use Portofino\Row\DefaultRow;
use Portofino\Sheet\NamedSheet;
use Portofino\Sheet\WithAutoSizedCells;
use Portofino\Style\Color\Red;

class XlsxTest extends TestCase
{
    public function testSuccessful()
    {
        $result =
            (new Xlsx())
                ->contents(
                    new WithAutoSizedCells(
                        new NamedSheet(
                            $this->sheetName(),
                            new BoldedHeader(
                                new StringCell('col1'),
                                new StringCell('col2'),
                                new StringCell('col3')
                            ),
                            new DefaultRow(
                                new StringCell('cell1-1'),
                                new ColoredBackground(
                                    new Red(),
                                    new StringCell('cell1-2')
                                ),
                                new BoldedCell(
                                    new ColoredFont(
                                        new Red(),
                                        new StringCell('cell1-3')
                                    )
                                )
                            ),
                            new BoldedRow(
                                new DefaultRow(
                                    new StringCell('---')
                                )
                            ),
                            new DefaultRow(
                                new BoldedCell(new StringCell('cell2-1')),
                                new LinkedCell(new StringCell('Погода'), 'https://yandex.ru/pogoda/moscow'),
                                new StringCell('veeeeeery long cell asdf asdf asdf asdf asdf ads f ads fa sdf ads fa')
                            )
                        )
                    )
                );

        $this->assertNotEmpty($result);

        file_put_contents('/tmp/test.xlsx', $result);
    }

    private function sheetName(): string
    {
        return 'test name';
    }
}

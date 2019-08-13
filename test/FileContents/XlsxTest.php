<?php

declare(strict_types=1);

namespace Portofino\Tests\FileContents;

use PHPUnit\Framework\TestCase;
use Portofino\Cell\BoldedCell;
use Portofino\Cell\ColoredBackground;
use Portofino\Cell\ColoredFont;
use Portofino\Cell\Content\Url\FromString;
use Portofino\Cell\LinkedCell;
use Portofino\Cell\PlainCell;
use Portofino\FileContents\Xlsx;
use Portofino\Header\BoldedHeader;
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
            (new Xlsx(
                new WithAutoSizedCells(
                    new NamedSheet(
                        $this->sheetName(),
                        new BoldedHeader(
                            new PlainCell('col1'),
                            new PlainCell('col2'),
                            new PlainCell('col3')
                        ),
                        new DefaultRow(
                            new PlainCell('cell1-1'),
                            new ColoredBackground(
                                new Red(),
                                new PlainCell('cell1-2')
                            ),
                            new BoldedCell(
                                new ColoredFont(
                                    new Red(),
                                    new PlainCell('cell1-3')
                                )
                            )
                        ),
                        new BoldedRow(
                            new DefaultRow(
                                new PlainCell('---')
                            )
                        ),
                        new DefaultRow(
                            new BoldedCell(new PlainCell('cell2-1')),
                            new LinkedCell(new PlainCell('Погода'), new FromString('https://yandex.ru/pogoda/moscow')),
                            new PlainCell('veeeeeery long cell asdf asdf asdf asdf asdf ads f ads fa sdf ads fa')
                        )
                    )
                )
            ))
                ->value();

        $this->assertNotEmpty($result);

        file_put_contents($this->filenameWithPath(), $result);
    }

    protected function setUp()
    {
        if (file_exists($this->filenameWithPath())) {
            unlink($this->filenameWithPath());
        }
    }

    private function filenameWithPath(): string
    {
        return sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'test.xlsx';
    }

    private function sheetName(): string
    {
        return 'test name';
    }
}

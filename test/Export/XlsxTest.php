<?php

declare(strict_types=1);

namespace Portofino\Tests\Export;

use Portofino\Cell\BoldedCell;
use Portofino\Cell\LinkedCell;
use Portofino\Cell\StringCell;
use Portofino\Export\Xlsx;
use PHPUnit\Framework\TestCase;
use Portofino\Header\BoldedHeader;
use Portofino\Payload\EmptySheet;
use Portofino\Payload\WithAutoSizedCells;
use Portofino\Payload\WithStyledSheet;
use Portofino\Row\DefaultRow;
use Portofino\Sheet\NamedSheet;

class XlsxTest extends TestCase
{
    public function testSuccessful()
    {
        $result =
            (new Xlsx(
                new WithAutoSizedCells(
                    new WithStyledSheet(
                        new EmptySheet(),
                        new NamedSheet(
                            'Sheet name',
                            new BoldedHeader(
                                new StringCell('col1'),
                                new StringCell('col2'),
                                new StringCell('col3')
                            ),
                            new DefaultRow(
                                new StringCell('cell1-1'),
                                new StringCell('cell1-2'),
                                new StringCell('cell1-3')
                            ),
                            new DefaultRow(
                                new BoldedCell(new StringCell('cell2-1')),
                                new LinkedCell(new StringCell('Погода'), 'https://yandex.ru/pogoda/moscow'),
                                new StringCell('veeeeeery long cell asdf asdf asdf asdf asdf ads f ads fa sdf ads fa')
                            )
                        )
                    )
                )
            ))
                ->value();

        $this->assertNotEmpty($result);

        file_put_contents('/tmp/test.xlsx', $result);
    }
}

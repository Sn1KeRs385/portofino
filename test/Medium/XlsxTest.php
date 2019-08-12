<?php

declare(strict_types=1);

namespace Portofino\Tests\Export;

use Portofino\Cell\BoldedCell;
use Portofino\Cell\LinkedCell;
use Portofino\Cell\StringCell;
use PHPUnit\Framework\TestCase;
use Portofino\Medium\Xlsx;

class XlsxTest extends TestCase
{
    public function testSuccessful()
    {
        $result =
            (new Xlsx())
                ->contents(
                    $this->sheetName(),
                    [
                        [
                            new StringCell('col1'),
                            new StringCell('col2'),
                            new StringCell('col3'),
                        ],
                        [
                            new StringCell('cell1-1'),
                            new StringCell('cell1-2'),
                            new StringCell('cell1-3'),
                        ],
                        [
                            new BoldedCell(new StringCell('cell2-1')),
                            new LinkedCell(new StringCell('Погода'), 'https://yandex.ru/pogoda/moscow'),
                            new StringCell('veeeeeery long cell asdf asdf asdf asdf asdf ads f ads fa sdf ads fa')
                        ],
                    ]
                );

        $this->assertNotEmpty($result);

        file_put_contents('/tmp/test.xlsx', $result);
    }

    private function sheetName(): string
    {
        return 'test name';
    }
}

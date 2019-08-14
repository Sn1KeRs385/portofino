<?php

declare(strict_types=1);

namespace Portofino\Tests\Row;

use Portofino\Cell;
use Portofino\Cell\PlainCell;
use Portofino\Row\BoldedRow;
use PHPUnit\Framework\TestCase;
use Portofino\Row\DefaultRow;

class BoldedRowTest extends TestCase
{
    public function testSuccessful()
    {
        $result =
            (new BoldedRow(
                new DefaultRow(
                    new PlainCell('cell1')
                )
            ))
                ->value();

        /** @var $result Cell[] */
        $this->assertEquals('cell1', $result[0]->content()->value());
        $this->assertTrue($result[0]->style()->font()->isBold());
    }
}

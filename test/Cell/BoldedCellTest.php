<?php

declare(strict_types=1);

namespace Portofino\Tests\Cell;

use Portofino\Cell\PlainCell;
use Portofino\Cell\BoldedCell;
use PHPUnit\Framework\TestCase;

class BoldedCellTest extends TestCase
{
    public function testSuccessful()
    {
        $result = new BoldedCell(new PlainCell('test'));

        $this->assertEquals('test', $result->content()->value());
        $this->assertTrue($result->style()->font()->isBold());
    }
}

<?php

declare(strict_types=1);

namespace Portofino\Tests\Cell;

use Portofino\Cell\StringCell;
use Portofino\Cell\BoldedCell;
use PHPUnit\Framework\TestCase;

class BoldedCellTest extends TestCase
{
    public function testSuccessful()
    {
        $result = new BoldedCell(new StringCell('test'));

        $this->assertEquals('test', $result->contents());
        $this->assertTrue($result->style()->fontBold());
    }
}

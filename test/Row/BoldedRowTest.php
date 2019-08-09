<?php

declare(strict_types=1);

namespace Portofino\Tests\Row;

use Portofino\Cell\StringCell;
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
                    new StringCell('cell1')
                )
            ))
                ->value();

        $this->assertEquals('cell1', $result[0]->value());
        $this->assertEquals(['font-weight' => 'bold'], $result[0]->styles());
    }
}

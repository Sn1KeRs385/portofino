<?php

declare(strict_types=1);

namespace Portofino\Tests\Medium;

use Portofino\Cell;
use Portofino\Medium;

class Fake implements Medium
{
    public function contents(string $name, array $cells): string
    {
        return
            implode(
                "\n",
                array_map(
                    function (array $row) {
                        return
                            implode(
                                ",",
                                array_map(
                                    function (Cell $cell) {
                                        return
                                            $cell->contents();
                                    },
                                    $row
                                )
                            );
                    },
                    $cells
                )
            );
    }
}
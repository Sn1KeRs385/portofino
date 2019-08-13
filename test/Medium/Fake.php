<?php

declare(strict_types=1);

namespace Portofino\Tests\Medium;

use Portofino\Cell;
use Portofino\Medium;
use Portofino\Sheet;

class Fake implements Medium
{
    public function contents(Sheet $sheet): string
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
                                            $cell->content();
                                    },
                                    $row
                                )
                            );
                    },
                    $sheet->value()
                )
            );
    }
}
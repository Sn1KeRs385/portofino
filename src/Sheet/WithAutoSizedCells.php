<?php

declare(strict_types=1);

namespace Portofino\Sheet;

use Portofino\Cell;
use Portofino\Sheet;
use Portofino\Cell\AutoSized;

class WithAutoSizedCells implements Sheet
{
    private $sheet;

    public function __construct(Sheet $sheet)
    {
        $this->sheet = $sheet;
    }

    public function value(): array
    {
        return
            array_map(
                function (array $row) {
                    return
                        array_map(
                            function (Cell $cell) {
                                return new AutoSized($cell);
                            },
                            $row
                        );
                },
                $this->sheet->value()
            );
    }

    public function name(): string
    {
        return $this->sheet->name();
    }
}
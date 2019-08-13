<?php

declare(strict_types=1);

namespace Portofino;

class FileContents
{
    private $medium;
    private $sheet;

    public function __construct(Medium $medium, Sheet $sheet)
    {
        $this->medium = $medium;
        $this->sheet = $sheet;
    }

    public function value(): string
    {
        return
            $this->medium
                ->contents(
                    $this->sheet->name,
                    array_merge(
                        [$this->header->value()],
                        array_map(
                            function (Row $row) {
                                return $row->value();
                            },
                            $this->body
                        )
                    )
                );
    }


}
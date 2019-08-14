<?php

declare(strict_types=1);

namespace Portofino\Sheet;

use Portofino\Header;
use Portofino\Row;
use Portofino\Sheet;

class NamedSheet implements Sheet
{
    private $name;
    private $header;
    private $body;

    public function __construct(string $name, Header $header, Row ...$body)
    {
        $this->name = $name;
        $this->header = $header;
        $this->body = $body;
    }

    public function value(): array
    {
        return
            array_merge(
                [$this->header->value()],
                array_map(
                    function (Row $row) {
                        return $row->value();
                    },
                    $this->body
                )
            );
    }

    public function name(): string
    {
        return $this->name;
    }
}
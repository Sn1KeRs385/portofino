<?php

declare(strict_types=1);

namespace Portofino\Sheet;

use Portofino\Header;
use Portofino\Medium;
use Portofino\Row;
use Portofino\Sheet;

class NamedSheet implements Sheet
{
    private $medium;
    private $name;
    private $header;
    private $body;

    public function __construct(Medium $medium, string $name, Header $header, Row ...$body)
    {
        $this->medium = $medium;
        $this->name = $name;
        $this->header = $header;
        $this->body = $body;
    }

    public function value(): string
    {
        return
            $this->medium
                ->contents(
                    $this->name,
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

    public function name(): string
    {
        return $this->name;
    }
}
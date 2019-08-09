<?php

declare(strict_types=1);

namespace Portofino\Cell;

use Portofino\Cell;

class LinkedCell implements Cell
{
    private $cell;
    private $url;

    public function __construct(Cell $cell, string $url)
    {
        $this->cell = $cell;
        $this->url = $url;
    }

    public function value()
    {
        return $this->cell->value();
    }

    public function styles(): array
    {
        return
            array_merge(
                $this->cell->styles(),
                ['url' => $this->url]
            );
    }
}
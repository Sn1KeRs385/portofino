<?php

declare(strict_types=1);

namespace Portofino\Cell;

use Portofino\Cell;
use Portofino\Style;
use Portofino\Style\Merged;
use Portofino\Style\Linked;

class LinkedCell implements Cell
{
    private $cell;
    private $url;

    public function __construct(Cell $cell, string $url)
    {
        $this->cell = $cell;
        $this->url = $url;
    }

    public function contents(): string
    {
        return $this->cell->contents();
    }

    public function style(): Style
    {
        return
            new Merged(
                $this->cell->style(),
                new Linked($this->url)
            );
    }
}
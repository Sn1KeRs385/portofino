<?php

declare(strict_types=1);

namespace Portofino\Cell;

use Portofino\Cell;
use Portofino\Style;
use Portofino\Cell\Content\RenamedContent;

class RenamedCell implements Cell
{
    private $name;
    private $cell;

    public function __construct(string $name, Cell $cell)
    {
        $this->name = $name;
        $this->cell = $cell;
    }

    public function content(): Content
    {
        return
            new RenamedContent(
                $this->name,
                $this->cell->content()
            );
    }

    public function style(): Style
    {
        return $this->cell->style();
    }
}
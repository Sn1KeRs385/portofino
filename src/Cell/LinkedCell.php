<?php

declare(strict_types=1);

namespace Portofino\Cell;

use Portofino\Cell;
use Portofino\Style;
use Portofino\Cell\Content\WithUrl;

class LinkedCell implements Cell
{
    private $cell;
    private $url;

    // todo string -> interface Url
    public function __construct(Cell $cell, string $url)
    {
        $this->cell = $cell;
        $this->url = $url;
    }

    public function content(): Content
    {
        return
            new WithUrl(
                $this->url,
                $this->cell->content()
            );
    }

    public function style(): Style
    {
        return $this->cell->style();
    }
}
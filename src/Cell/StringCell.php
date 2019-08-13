<?php

declare(strict_types=1);

namespace Portofino\Cell;

use Portofino\Cell;
use Portofino\Style;
use Portofino\Style\Plain;
use Portofino\Cell\Content\StringContent;

class StringCell implements Cell
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function content(): Content
    {
        return
            new StringContent($this->value);
    }

    public function style(): Style
    {
        return new Plain();
    }
}
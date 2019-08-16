<?php

declare(strict_types=1);

namespace Portofino\Cell;

use Portofino\Cell;
use Portofino\Style;
use Portofino\Cell\Content\EmptyContent;
use Portofino\Style\DefaultStyle;

class EmptyCell implements Cell
{
    public function content(): Content
    {
        return new EmptyContent();
    }

    public function style(): Style
    {
        return new DefaultStyle();
    }
}
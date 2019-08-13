<?php

declare(strict_types=1);

namespace Portofino;

use Portofino\Cell\Content;

interface Cell
{
    public function content(): Content;
    public function style(): Style;
}
<?php

declare(strict_types=1);

namespace Portofino;

interface Cell
{
    public function contents(): string;
    public function style(): Style;
}
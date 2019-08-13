<?php

declare(strict_types=1);

namespace Portofino\Style;

interface Font
{
    public function isBold(): bool;
    public function color(): Color;
}
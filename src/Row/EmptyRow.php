<?php

declare(strict_types=1);

namespace Portofino\Row;

use Portofino\Row;

class EmptyRow implements Row
{
    public function value(): array
    {
        return [];
    }
}
<?php

declare(strict_types=1);

namespace Portofino\Header;

use Portofino\Header;

class EmptyHeader implements Header
{
    public function value(): iterable
    {
        return [];
    }
}
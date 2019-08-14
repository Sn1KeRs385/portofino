<?php

declare(strict_types=1);

namespace Portofino\Style\Color;

use Portofino\Style\Color;
use Exception;

class DefaultBackgroundColor implements Color
{
    public function value(): string
    {
        throw new Exception("Color value is not set");
    }

    public function isSet(): bool
    {
        return false;
    }
}
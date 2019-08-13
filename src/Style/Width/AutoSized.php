<?php

declare(strict_types=1);

namespace Portofino\Style\Width;

use Portofino\Style\Width;
use Exception;

class AutoSized implements Width
{
    public function value(): int
    {
        throw new Exception('Autosized width has no value');
    }

    public function isAutoSized(): bool
    {
        return true;
    }

    public function isFixed(): bool
    {
        return false;
    }
}
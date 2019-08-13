<?php

declare(strict_types=1);

namespace Portofino\Style\Width;

use Portofino\Style\Width;
use Exception;

class DefaultWidth implements Width
{
    public function value(): int
    {
        throw new Exception('Not fixed value has no value');
    }

    public function isAutoSized(): bool
    {
        return false;
    }

    public function isFixed(): bool
    {
        return false;
    }
}
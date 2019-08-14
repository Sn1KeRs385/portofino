<?php

declare(strict_types=1);

namespace Portofino\Style\Width;

use Portofino\Style\Width;

// todo implementation in PhpSpreadsheet (Xlsx.php)
class Fixed implements Width
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function isAutoSized(): bool
    {
        return false;
    }

    public function isFixed(): bool
    {
        return true;
    }
}
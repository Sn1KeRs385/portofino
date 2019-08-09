<?php

declare(strict_types=1);

namespace Portofino\Cell;

use Portofino\Cell;

class StringCell implements Cell
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function styles(): array
    {
        return [];
    }
}
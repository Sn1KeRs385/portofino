<?php

declare(strict_types=1);

namespace Portofino\Cell\Content;

use Portofino\Cell\Content;

class StringContent implements Content
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

    public function url(): string
    {
        return '';
    }

    public function isLink(): bool
    {
        return false;
    }
}
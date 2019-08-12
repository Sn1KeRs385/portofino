<?php

declare(strict_types=1);

namespace Portofino;

interface Medium
{
    public function contents(string $name, array $cells): string;
}
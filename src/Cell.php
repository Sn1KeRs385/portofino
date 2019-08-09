<?php

declare(strict_types=1);

namespace Portofino;

interface Cell
{
    public function value();
    public function styles(): array;
}
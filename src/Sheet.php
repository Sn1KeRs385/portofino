<?php

declare(strict_types=1);

namespace Portofino;

interface Sheet
{
    public function value(): array;
    public function name(): string;
}
<?php

declare(strict_types=1);

namespace Portofino\Style;

interface Color
{
    public function value(): string;
    public function isSet(): bool;
}
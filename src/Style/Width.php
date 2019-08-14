<?php

declare(strict_types=1);

namespace Portofino\Style;

interface Width
{
    public function value(): int;
    public function isAutoSized(): bool;
    public function isFixed(): bool;
}
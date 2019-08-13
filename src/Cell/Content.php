<?php

declare(strict_types=1);

namespace Portofino\Cell;

interface Content
{
    public function value(): string;
    public function isLink(): bool;
    public function url(): string;
}
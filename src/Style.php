<?php

declare(strict_types=1);

namespace Portofino;

interface Style
{
    public function fontBold(): bool;
    public function linked(): bool;
    public function url(): string;
}
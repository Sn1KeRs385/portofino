<?php

declare(strict_types=1);

namespace Portofino;

interface Export
{
    public function value(): string;
}
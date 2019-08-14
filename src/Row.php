<?php

declare(strict_types=1);

namespace Portofino;

interface Row
{
    public function value(): iterable;
}
<?php

declare(strict_types=1);

namespace Portofino;

interface Header
{
    public function value(): iterable;
}
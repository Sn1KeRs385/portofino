<?php

declare(strict_types=1);

namespace Portofino;

interface Medium
{
    public function contents(Sheet $sheet): string;
}
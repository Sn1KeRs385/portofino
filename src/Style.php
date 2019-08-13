<?php

declare(strict_types=1);

namespace Portofino;

use Portofino\Style\Font;
use Portofino\Style\Color;

interface Style
{
    public function font(): Font;
    public function backgroundColor(): Color;
    public function autoSized(): bool;
}
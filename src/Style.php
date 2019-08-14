<?php

declare(strict_types=1);

namespace Portofino;

use Portofino\Style\Background;
use Portofino\Style\Font;
use Portofino\Style\Width;

interface Style
{
    public function font(): Font;
    public function background(): Background;
    public function width(): Width;
}
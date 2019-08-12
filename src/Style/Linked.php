<?php

declare(strict_types=1);

namespace Portofino\Style;

use Portofino\Style;

class Linked implements Style
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function fontBold(): bool
    {
        return false;
    }

    public function linked(): bool
    {
        return true;
    }

    public function url(): string
    {
        return $this->url;
    }
}
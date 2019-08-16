<?php

declare(strict_types=1);

namespace Portofino\Cell\Content;

use Portofino\Cell\Content;
use Exception;

class EmptyContent implements Content
{
    public function value(): string
    {
        return '';
    }

    public function isLink(): bool
    {
        return false;
    }

    public function url(): Url
    {
        throw new Exception('Content is not linked');
    }
}
<?php

declare(strict_types=1);

namespace Portofino\Cell\Content;

use Portofino\Cell\Content;

class RenamedContent implements Content
{
    private $name;
    private $content;

    public function __construct(string $name, Content $content)
    {
        $this->name = $name;
        $this->content = $content;
    }

    public function value(): string
    {
        return $this->name;
    }

    public function isLink(): bool
    {
        return $this->content->isLink();
    }

    public function url(): Url
    {
        return $this->content->url();
    }
}
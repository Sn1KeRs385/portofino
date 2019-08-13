<?php

declare(strict_types=1);

namespace Portofino\Cell\Content;

use Portofino\Cell\Content;

class WithUrl implements Content
{
    private $url;
    private $content;

    public function __construct(Url $url, Content $content)
    {
        $this->url = $url;
        $this->content = $content;
    }

    public function value(): string
    {
        return $this->content->value();
    }

    public function url(): Url
    {
        return $this->url;
    }

    public function isLink(): bool
    {
        return true;
    }
}
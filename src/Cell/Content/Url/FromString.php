<?php

declare(strict_types=1);

namespace Portofino\Cell\Content\Url;

use Portofino\Cell\Content\Url;
use Exception;

class FromString implements Url
{
    private $url;

    public function __construct(string $uri)
    {
        if (!preg_match('@^(https?|ftp)://[^\s/$.?#].[^\s]*$@iS', $uri)) {
            throw new Exception('Url is invalid');
        }

        $this->url = $uri;
    }

    public function value(): string
    {
        return $this->url;
    }
}

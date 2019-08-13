<?php

declare(strict_types=1);

namespace Portofino\Tests\Cell\Content\Url;

use PHPUnit\Framework\TestCase;
use Exception;
use Portofino\Cell\Content\Url\FromString;

class FromStringTest extends TestCase
{
    /**
     * @dataProvider validUrls
     */
    public function testValidUrls(string $uriString)
    {
        $query = new FromString($uriString);

        $this->assertEquals($uriString, $query->value());
    }

    public function validUrls()
    {
        return
            [
                ['http://vasya/limit=10&offset=100'],
                ['http://vasya?limit=10&offset=100'],
                ['http://192.168.24.3'], // yes, this is a valid url
                ['http://vasya:8000'],
                ['http://vasya_oms:8000'],
                ['https://ya.ru/test:8000'],
            ];
    }

    /**
     * @dataProvider invalidUrls
     */
    public function testInvalidUris(string $uriString)
    {
        try {
            new FromString($uriString);
            $this->fail('Url should not have been created');
        } catch (Exception $e) {
            $this->assertTrue(true);
        }
    }

    public function invalidUrls()
    {
        return
            [
                ['vasya/limit=10&offset=100'],
                ['vasya'],
                ['192.168.24.3'],
                ['htttp://vasya?limit=10&offset=100'],
                ['htt://vasya?limit=10&offset=100'],
                ['htt://vasya?limit=10&offset=100'],
            ];
    }
}

<?php

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Url;

class UrlTest extends TestCase
{
    public function testAll()
    {
        $full = uniqid();
        $url = new Url($full);
        $data = [
            'full' => $full,
        ];
        $this->assertSame($full, $url->getFull());
        $this->assertSame($data, $url->toArray());
    }
}


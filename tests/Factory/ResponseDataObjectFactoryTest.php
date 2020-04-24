<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Request\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\Factory\ResponseDataObjectFactory;

class ResponseDataObjectFactoryTest extends TestCase
{
    public function testCreateSimpleList()
    {
        $factory = new ResponseDataObjectFactory();
        $list = $factory->createSimpleList([]);
        $this->assertInstanceOf(SimpleList::class, $list);
    }
}

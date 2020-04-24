<?php

namespace TeasTest\AlphaApiClient\Request\Response;

use BootIq\ServiceLayer\Enum\HttpMethod;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\Factory\ResponseDataObjectFactory;
use Teas\AlphaApiClient\Request\PostAvailableCarsRequest;
use Teas\AlphaApiClient\Request\SourcingCarRequestFactory;

class ResponseDataObjectFactoryTest extends TestCase
{
    public function testCreateSimpleList()
    {
        $factory = new ResponseDataObjectFactory();
        $list = $factory->createSimpleList([]);
        $this->assertInstanceOf(SimpleList::class, $list);
    }
}

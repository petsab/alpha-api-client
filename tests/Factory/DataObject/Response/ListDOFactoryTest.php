<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Factory\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\CarList;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\Factory\DataObject\Response\ListDOFactory;

class ListDOFactoryTest extends TestCase
{
    public function testCreateSimpleList()
    {
        $factory = new ListDOFactory();
        $list = $factory->createSimpleList([]);
        $this->assertInstanceOf(SimpleList::class, $list);
    }

    public function testCreateCarList()
    {
        $factory = new ListDOFactory();
        $list = $factory->createCarList([], []);
        $this->assertInstanceOf(CarList::class, $list);
    }
}

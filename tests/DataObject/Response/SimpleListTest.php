<?php

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\DataObjectInterface;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;

class SimpleListTest extends TestCase
{
    public function testAll()
    {
        $obj = $this->createMock(DataObjectInterface::class);
        $objData = [
            'id' => uniqid(),
        ];
        $obj->expects(self::once())
            ->method('toArray')
            ->willReturn($objData);

        $list = new SimpleList([$obj]);
        $this->assertSame([$obj], $list->getData());
        $data = [
            'data' => [$objData],
        ];
        $this->assertSame($data, $list->toArray());
    }
}


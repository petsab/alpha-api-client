<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\DataObjectInterface;
use Teas\AlphaApiClient\DataObject\Response\CarList;

class CarListTest extends TestCase
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
        $notFoundIds = [];
        for ($i = 0; $i < rand(5, 10); $i++) {
            $notFoundIds[] = uniqid();
        }

        $list = new CarList([$obj], $notFoundIds);
        $this->assertSame([$obj], $list->getData());
        $this->assertSame($notFoundIds, $list->getNotFoundIds());
        $data = [
            'data' => [$objData],
            'notFoundIds' => $notFoundIds,
        ];
        $this->assertSame($data, $list->toArray());
    }
}

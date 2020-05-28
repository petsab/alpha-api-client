<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Rating;
use Teas\AlphaApiClient\DataObject\Response\TopSellingCar;

class TopSellingCarTest extends TestCase
{
    public function testAll()
    {
        $count = rand(1, 10);
        $make = uniqid();
        $model = uniqid();
        $topSellingCar = new TopSellingCar($count, $make, $model);
        $this->assertSame($make, $topSellingCar->getMake());
        $this->assertSame($model, $topSellingCar->getModel());
        $this->assertSame($count, $topSellingCar->getCount());
        $data = [
            'model' => $model,
            'make' => $make,
            'count' => $count,
        ];
        $this->assertEquals($data, $topSellingCar->toArray());
    }
}

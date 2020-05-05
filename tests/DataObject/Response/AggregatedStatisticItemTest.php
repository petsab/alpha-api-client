<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatisticItem;

class AggregatedStatisticItemTest extends TestCase
{
    public function testAll()
    {
        $type = uniqid();
        $amount = rand(0, 10000);
        $mileage = rand(0, 10000) / 1.3;
        $price = rand(0, 10000) / 1.3;

        $instance = new AggregatedStatisticItem($type, $amount, $mileage, $price);

        $this->assertEquals($type, $instance->getType());
        $this->assertEquals($amount, $instance->getAmount());
        $this->assertEquals($mileage, $instance->getMileage());
        $this->assertEquals($price, $instance->getPrice());
        $this->assertEquals(
            [
                'type' => $type,
                'amount' => $amount,
                'mileage' => $mileage,
                'price' => $price,
            ],
            $instance->toArray()
        );
    }
}

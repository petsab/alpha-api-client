<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatisticLevel;

class AggregatedStatisticLevelTest extends TestCase
{
    public function testAll()
    {
        $name = uniqid();
        $value = uniqid();

        $instance = new AggregatedStatisticLevel($name, $value);

        $this->assertEquals($name, $instance->getName());
        $this->assertEquals($value, $instance->getValue());
        $this->assertEquals(
            [
                'name' => $name,
                'value' => $value,
            ],
            $instance->toArray()
        );
    }
}

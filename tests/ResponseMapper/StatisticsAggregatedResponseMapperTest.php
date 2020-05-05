<?php

namespace TeasTest\AlphaApiClient\ResponseMapper;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatistic;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatisticItem;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatisticLevel;
use Teas\AlphaApiClient\Factory\ResponseDataObjectFactory;
use Teas\AlphaApiClient\ResponseMapper\StatisticsAggregatedResponseMapper;

class StatisticsAggregatedResponseMapperTest extends TestCase
{
    public function testAll()
    {
        $instance = new StatisticsAggregatedResponseMapper(new ResponseDataObjectFactory());
        $data = include __DIR__ . '/input/testStatisticsAggregatedResponseMapperTest.php';

        $result = $instance->map($data);

        $this->assertInstanceOf(AggregatedStatistic::class, $result);
        /** @var AggregatedStatisticLevel $level */
        foreach ($result->getLevels() as $level) {
            $this->assertEquals($data[$level->getName()], $level->getValue());
        }
        /** @var AggregatedStatisticItem $statistic */
        foreach ($result->getStatistics() as $statistic) {
            $this->assertEquals($data[$statistic->getType()], $statistic->getAmount());
            $this->assertEquals($data[$statistic->getType() . '_mileage'], $statistic->getMileage());
            $this->assertEquals($data[$statistic->getType() . '_price'], $statistic->getPrice());
        }
    }
}

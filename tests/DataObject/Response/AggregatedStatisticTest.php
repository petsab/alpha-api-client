<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatistic;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatisticItem;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatisticLevel;

class AggregatedStatisticTest extends TestCase
{
    public function testAll()
    {
        $level1 = $this->createMock(AggregatedStatisticLevel::class);
        $level2 = $this->createMock(AggregatedStatisticLevel::class);
        $levels = [
            $level1,
            $level2,
        ];
        $statistic1 = $this->createMock(AggregatedStatisticItem::class);
        $statistic2 = $this->createMock(AggregatedStatisticItem::class);
        $statistics = [
            $statistic1,
            $statistic2,
        ];

        $instance = new AggregatedStatistic(
            $levels,
            $statistics
        );

        $this->assertEquals($levels, $instance->getLevels());
        $this->assertEquals($statistics, $instance->getStatistics());
        $this->assertEquals(
            [
                'levels' => $levels,
                'statistics' => $statistics,
            ],
            $instance->toArray()
        );
    }
}

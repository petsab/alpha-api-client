<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\AggregatedStatistic;
use Teas\AlphaApiClient\Enum\AggregatedStatisticItemType;
use Teas\AlphaApiClient\Enum\AggregationLevel;
use Teas\AlphaApiClient\Factory\DataObject\Response\AggregateStatisticDOFactory;

class StatisticsAggregatedResponseMapper
{
    /**
     * @var AggregateStatisticDOFactory
     */
    private $aggregateStatisticDOFactory;

    /**
     * @param AggregateStatisticDOFactory $aggregateStatisticDOFactory
     */
    public function __construct(AggregateStatisticDOFactory $aggregateStatisticDOFactory)
    {
        $this->aggregateStatisticDOFactory = $aggregateStatisticDOFactory;
    }

    /**
     * @param array<mixed> $data
     * @return AggregatedStatistic
     */
    public function map(array $data): AggregatedStatistic
    {
        $levels = [];
        foreach (AggregationLevel::LEVEL_AVAILABLE as $level) {
            if (!isset($data[$level])) {
                continue;
            }
            $levels[] = $this->aggregateStatisticDOFactory->createAggregatedStatisticLevel($level, $data[$level]);
        }

        $statistics = [];
        foreach (AggregatedStatisticItemType::TYPES_AVAILABLE as $type) {
            $statistics[] = $this->aggregateStatisticDOFactory->createAggregatedStatisticItem(
                $type,
                $data[$type],
                $data[$type . '_mileage'],
                $data[$type . '_price']
            );
        }

        return $this->aggregateStatisticDOFactory->createAggregatedStatistic(
            $levels,
            $statistics
        );
    }
}

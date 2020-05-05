<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\AggregatedStatistic;
use Teas\AlphaApiClient\Enum\AggregatedStatisticItemType;
use Teas\AlphaApiClient\Enum\AggregationLevel;

class StatisticsAggregatedResponseMapper extends AbstractResponseMapper
{
    /**
     * @param array $data
     * @return AggregatedStatistic
     */
    public function map(array $data): AggregatedStatistic
    {
        $levels = [];
        foreach (AggregationLevel::LEVEL_AVAILABLE as $level) {
            if (!isset($data[$level])) {
                continue;
            }
            $levels[] = $this->factory->createAggregatedStatisticLevel($level, $data[$level]);
        }

        $statistics = [];
        foreach (AggregatedStatisticItemType::TYPES_AVAILABLE as $type) {
            $statistics[] = $this->factory->createAggregatedStatisticItem(
                $type,
                $data[$type],
                $data[$type . '_mileage'],
                $data[$type . '_price']
            );
        }

        return $this->factory->createAggregatedStatistic(
            $levels,
            $statistics
        );
    }
}

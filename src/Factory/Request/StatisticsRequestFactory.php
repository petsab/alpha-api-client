<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory\Request;

use Teas\AlphaApiClient\DataObject\Request\StatisticsAggregatedParams;
use Teas\AlphaApiClient\Enum\AggregationLevel;
use Teas\AlphaApiClient\Exception\InvalidArgumentException;
use Teas\AlphaApiClient\Request\Statistics\GetStatisticsAggregated;

class StatisticsRequestFactory
{
    /**
     * @param array<string> $levels
     * @param array<string> $regions
     * @param StatisticsAggregatedParams $params
     * @throws InvalidArgumentException
     * @return GetStatisticsAggregated
     */
    public function createGetStatisticsAggregatedRequest(
        array $levels,
        array $regions,
        StatisticsAggregatedParams $params
    ): GetStatisticsAggregated {
        if (empty($levels) || empty($regions)) {
            throw new InvalidArgumentException('At least one level and region is required');
        }
        $levelsDiff = array_diff($levels, AggregationLevel::LEVEL_AVAILABLE);
        if (!empty($levelsDiff)) {
            throw new InvalidArgumentException('Unknown levels: ' . implode(', ', $levelsDiff));
        }

        return new GetStatisticsAggregated(
            $levels,
            $regions,
            $params
        );
    }
}

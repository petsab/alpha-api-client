<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory\DataObject\Response;

use Teas\AlphaApiClient\DataObject\Response\AggregatedStatistic;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatisticItem;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatisticLevel;

class AggregateStatisticDOFactory
{
    /**
     * @param string $name
     * @param string $value
     * @return AggregatedStatisticLevel
     */
    public function createAggregatedStatisticLevel(string $name, string $value): AggregatedStatisticLevel
    {
        return new AggregatedStatisticLevel($name, $value);
    }

    /**
     * @param string $type
     * @param int $amount
     * @param float|null $mileage
     * @param float|null $price
     * @return AggregatedStatisticItem
     */
    public function createAggregatedStatisticItem(
        string $type,
        int $amount,
        ?float $mileage,
        ?float $price
    ): AggregatedStatisticItem {
        return new AggregatedStatisticItem($type, $amount, $mileage, $price);
    }

    /**
     * @param array<AggregatedStatisticLevel> $levels
     * @param array<AggregatedStatisticItem> $statistics
     * @return AggregatedStatistic
     */
    public function createAggregatedStatistic(array $levels, array $statistics): AggregatedStatistic
    {
        return new AggregatedStatistic($levels, $statistics);
    }
}

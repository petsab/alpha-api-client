<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class AggregatedStatistic implements DataObjectInterface
{
    /**
     * @var array<AggregatedStatisticLevel>
     */
    private $levels = [];

    /**
     * @var array<AggregatedStatisticItem>
     */
    private $statistics = [];

    /**
     * @param array<AggregatedStatisticLevel> $levels
     * @param array<AggregatedStatisticItem> $statistics
     */
    public function __construct(array $levels, array $statistics)
    {
        $this->levels = $levels;
        $this->statistics = $statistics;
    }

    /**
     * @return array<AggregatedStatisticLevel>
     */
    public function getLevels(): array
    {
        return $this->levels;
    }

    /**
     * @return array<AggregatedStatisticItem>
     */
    public function getStatistics(): array
    {
        return $this->statistics;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'levels' => $this->levels,
            'statistics' => $this->statistics,
        ];
    }
}

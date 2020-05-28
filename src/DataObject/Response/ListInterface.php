<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

interface ListInterface
{
    /**
     * @return array<Car|AvailableCar|TopSellingCar|AggregatedStatistic>
     */
    public function getData(): array;
}

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory\DataObject\Response;

use Teas\AlphaApiClient\DataObject\Response\AggregatedStatistic;
use Teas\AlphaApiClient\DataObject\Response\AvailableCar;
use Teas\AlphaApiClient\DataObject\Response\Car;
use Teas\AlphaApiClient\DataObject\Response\CarList;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\DataObject\Response\TopSellingCar;

class ListDOFactory
{
    /**
     * @param array<Car|AvailableCar|TopSellingCar|AggregatedStatistic> $data
     * @return SimpleList
     */
    public function createSimpleList(array $data): SimpleList
    {
        return new SimpleList($data);
    }

    /**
     * @param array<Car|AvailableCar|TopSellingCar|AggregatedStatistic> $data
     * @param array<string> $notFoundIds
     * @return CarList
     */
    public function createCarList(array $data, array $notFoundIds): CarList
    {
        return new CarList($data, $notFoundIds);
    }
}

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\Car;

class CarResponseMapper extends BaseCarResponseMapper
{
    /**
     * @param array<mixed> $data
     * @return Car
     */
    public function map(array $data): Car
    {
        $car = $this->carDOFactory->createCar($data['PK']);
        $this->fillBaseCarData($data, $car);

        if (isset($data['measure_car_rank'])) {
            $car->setMeasure($this->mapMeasure($data));
        }

        $car->setPremiumFeatures($data['premium_features'] ?? []);
        $car->setTurnover($data['turnover'] ?? null);
        $car->setAvailable($data['available_car']);

        return $car;
    }
}

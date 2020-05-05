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
        $car = $this->factory->createCar($data['PK']);
        $this->fillBaseCarData($data, $car);
        $car->setAvailable($data['available_car']);

        return $car;
    }
}

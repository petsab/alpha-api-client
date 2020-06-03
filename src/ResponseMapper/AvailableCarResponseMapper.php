<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\AvailableCar;

class AvailableCarResponseMapper extends BaseCarResponseMapper
{
    /**
     * @param array<mixed> $data
     * @return AvailableCar
     */
    public function map(array $data): AvailableCar
    {
        $car = $this->carDOFactory->createAvailableCar($data['PK']);
        $this->fillBaseCarData($data, $car);
        $car->setMeasure($this->mapMeasure($data))
            ->setPremiumFeatures($data['premium_features'])
            ->setTurnover($data['turnover']);

        return $car;
    }
}

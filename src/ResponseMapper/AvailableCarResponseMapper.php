<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\Measure;
use Teas\AlphaApiClient\DataObject\Response\AvailableCar;

class AvailableCarResponseMapper extends BaseCarResponseMapper
{
    /**
     * @param array<mixed> $data
     * @return AvailableCar
     */
    public function map(array $data): AvailableCar
    {
        $car = $this->factory->createAvailableCar($data['PK']);
        $this->fillBaseCarData($data, $car);
        $car->setMeasure($this->mapMeasure($data))
            ->setPremiumFeatures($data['premium_features']);

        return $car;
    }

    /**
     * @param array<mixed> $data
     * @return Measure
     */
    private function mapMeasure(array $data): Measure
    {
        $measure = $this->factory->createMeasure();
        $measure->setCarRank($data['measure_car_rank'])
            ->setCountRelevantCar($data['measure_count_relevant_car'])
            ->setDelta($data['measure_delta'])
            ->setLevel($data['measure_level'])
            ->setLiquidity($data['measure_liquidity'])
            ->setPpLevel($data['measure_pp_level'])
            ->setRate($data['measure_rate'])
            ->setRelativePricePosition($data['measure_relative_price_position'])
            ->setRetailPricePosition($data['measure_retail_price_position'])
            ->setSoldRangeCategory($data['measure_sold_range_category'])
            ->setTotalScore($data['measure_total_score']);

        return $measure;
    }
}

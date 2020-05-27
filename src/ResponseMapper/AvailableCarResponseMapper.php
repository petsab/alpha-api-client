<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\Measure;
use Teas\AlphaApiClient\DataObject\Response\AvailableCar;
use Teas\AlphaApiClient\DataObject\Response\Percentile;

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
            ->setPercentile($this->mapPercentile($data));

        return $car;
    }

    /**
     * @param array<mixed> $data
     * @return Measure
     */
    private function mapMeasure(array $data): Measure
    {
        $measure = $this->carDOFactory->createMeasure();
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

    /**
     * @param array<mixed> $data
     * @return Percentile
     */
    private function mapPercentile(array $data): Percentile
    {
        $percentile = $this->carDOFactory->createPercentile();
        $percentile->setValue0($data['measure_percentile_0_price'])
            ->setValue10($data['measure_percentile_10_price'])
            ->setValue20($data['measure_percentile_20_price'])
            ->setValue30($data['measure_percentile_30_price'])
            ->setValue40($data['measure_percentile_40_price'])
            ->setValue50($data['measure_percentile_50_price'])
            ->setValue60($data['measure_percentile_60_price'])
            ->setValue70($data['measure_percentile_70_price'])
            ->setValue80($data['measure_percentile_80_price'])
            ->setValue90($data['measure_percentile_90_price'])
            ->setValue100($data['measure_percentile_100_price']);

        return $percentile;
    }
}

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\AbstractBaseCar;
use Teas\AlphaApiClient\DataObject\Response\Measure;
use Teas\AlphaApiClient\DataObject\Response\Occurrence;
use Teas\AlphaApiClient\DataObject\Response\Percentile;
use Teas\AlphaApiClient\DataObject\Response\Price;
use Teas\AlphaApiClient\DataObject\Response\Seller;
use Teas\AlphaApiClient\Factory\DataObject\Response\CarDOFactory;
use Teas\AlphaApiClient\Traits\NullableDateTimeTrait;

class BaseCarResponseMapper
{
    use NullableDateTimeTrait;

    /**
     * @var CarDOFactory
     */
    protected $carDOFactory;

    /**
     * @var UrlResponseMapper
     */
    private $urlResponseMapper;

    /**
     * @param CarDOFactory $carDOFactory
     * @param UrlResponseMapper $urlResponseMapper
     */
    public function __construct(
        CarDOFactory $carDOFactory,
        UrlResponseMapper $urlResponseMapper
    ) {
        $this->carDOFactory = $carDOFactory;
        $this->urlResponseMapper = $urlResponseMapper;
    }

    /**
     * @param array<mixed> $data
     * @param AbstractBaseCar $car
     */
    public function fillBaseCarData(array $data, AbstractBaseCar $car): void
    {
        $car->setAdId($data['ad_id'])
            ->setCarStyle($data['car_style'])
            ->setCondition($data['condition'])
            ->setCubicCapacity($data['cubic_capacity'])
            ->setDaysOnStock($data['days_on_stock'])
            ->setDriveType($data['drive_type'])
            ->setFeatureScore($data['feature_score'])
            ->setFeatures($data['features'])
            ->setFuelType($data['fuel_type'])
            ->setInteriorMaterial($data['interior_material'])
            ->setMake($data['make'])
            ->setOccurrence($this->mapOccurrence($data))
            ->setMileage($data['mileage'])
            ->setMobileDeUrl($this->urlResponseMapper->map($data['mobile_de_url']))
            ->setModel($data['model'])
            ->setNumberOfSeats($data['number_of_seats'])
            ->setOriginCountry($data['origin_country'])
            ->setPower($data['power'])
            ->setPrice($this->mapPrice($data))
            ->setSAutoUrl($this->urlResponseMapper->map($data['sauto_url']))
            ->setServer($data['server'])
            ->setSeller($this->mapSeller($data))
            ->setTransmission($data['transmission'])
            ->setUrl($this->urlResponseMapper->map($data['url']))
            ->setVin($data['vin'])
            ->setYear($data['year'])
            ->setTechnicalInspectionValidTo($this->stringToDateTime($data['technical_inspection_valid_to']))
            ->setThumbnailUrl($this->urlResponseMapper->map($data['thumbnail_url']))
            ->setMetaUpdated($this->stringToDateTime($data['meta_updated_timestamp']));
    }

    /**
     * @param array<mixed> $data
     * @return Occurrence
     */
    private function mapOccurrence(array $data): Occurrence
    {
        $first = $this->stringToDateTime($data['first_occurrence']);
        $last = $this->stringToDateTime($data['last_occurrence']);

        return $this->carDOFactory->createOccurrence($first, $last);
    }

    /**
     * @param array<mixed> $data
     * @return Price
     */
    private function mapPrice(array $data): Price
    {
        $originalPrice = null === $data['original_price_with_vat'] ? null : intval($data['original_price_with_vat']);
        $price = $this->carDOFactory->createPrice(
            $data['price_with_vat'],
            $data['currency'],
            $originalPrice,
            $data['original_currency']
        );
        $price->setChange($data['price_change'])
            ->setVatReclaimable($data['vat_reclaimable'])
            ->setVatRate($data['vat_rate']);

        return $price;
    }

    /**
     * @param array<mixed> $data
     * @return Seller
     */
    private function mapSeller(array $data): Seller
    {
        $seller = $this->carDOFactory->creteSeller($data['seller']['name']);
        $rating = $this->carDOFactory->createRating($data['seller']['rating_average'], $data['seller']['rating_count']);
        $seller->setPhone($data['seller']['phone'])
            ->setEmail($data['seller']['email'])
            ->setRating($rating)
            ->setType($data['seller']['type'])
            ->setAddress($data['seller']['address'])
            ->setCity($data['seller']['city'])
            ->setZip($data['seller']['zip'])
            ->setCountry($data['seller_country']);

        return $seller;
    }

    /**
     * @param array<mixed> $data
     * @return Measure
     */
    protected function mapMeasure(array $data): Measure
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
        $percentile = isset($data['measure_percentile_0_price'])
            ? $this->mapPercentile($data)
            : null;
        $measure->setPercentile($percentile);

        return $measure;
    }

    /**
     * @param array<mixed> $data
     * @return Percentile
     */
    protected function mapPercentile(array $data): Percentile
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

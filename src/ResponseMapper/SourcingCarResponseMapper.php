<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\Measure;
use Teas\AlphaApiClient\DataObject\Response\Occurrence;
use Teas\AlphaApiClient\DataObject\Response\Price;
use Teas\AlphaApiClient\DataObject\Response\Seller;
use Teas\AlphaApiClient\DataObject\Response\SourcingCar;
use Teas\AlphaApiClient\Factory\ResponseDataObjectFactory;
use Teas\AlphaApiClient\Traits\NullableDateTimeTrait;

class SourcingCarResponseMapper extends AbstractResponseMapper
{
    use NullableDateTimeTrait;

    /**
     * @var UrlResponseMapper
     */
    private $urlResponseMapper;

    /**
     * SourcingCarResponseMapper constructor.
     * @param ResponseDataObjectFactory $factory
     * @param UrlResponseMapper $urlResponseMapper
     */
    public function __construct(
        ResponseDataObjectFactory $factory,
        UrlResponseMapper $urlResponseMapper
    ) {
        parent::__construct($factory);
        $this->urlResponseMapper = $urlResponseMapper;
    }

    /**
     * @param array<mixed> $data
     * @return SourcingCar
     */
    public function map(array $data): SourcingCar
    {
        $car = $this->factory->createSourcingCar($data['PK']);
        $car->setAdId($data['ad_id'])
            ->setBodyType($data['body_type'])
            ->setBuyerCountry($data['buyer_country'])
            ->setCondition($data['condition'])
            ->setCubicCapacity($data['cubic_capacity'])
            ->setDaysOnStock($data['days_on_stock'])
            ->setDriveType($data['drive_type'])
            ->setFeatureScore($data['feature_score'])
            ->setFeatures($data['features'])
            ->setFuelType($data['fueltype'])
            ->setInteriorMaterial($data['interior_material'])
            ->setMake($data['make'])
            ->setMeasure($this->mapMeasure($data))
            ->setOccurrence($this->mapOccurrence($data))
            ->setMileage($data['mileage'])
            ->setMobileDeUrl($this->urlResponseMapper->map($data['mobile_de_url']))
            ->setModel($data['model'])
            ->setNumberOfSeats($data['number_of_seats'])
            ->setOriginCountry($data['origin_country'])
            ->setPower($data['power'])
            ->setPrice($this->mapPrice($data))
            ->setSAutoUrl($this->urlResponseMapper->map($data['sauto_url']))
            ->setSeller($this->mapSeller($data))
            ->setServer($data['server'])
            ->setTransmission($data['transmission'])
            ->setUrl($this->urlResponseMapper->map($data['url']))
            ->setVin($data['vin'])
            ->setYear($data['year'])
            ->setTechnicalInspectionValidTo($this->stringToDateTime($data['technical_inspection_valid_to']))
            ->setMetaUpdated($this->stringToDateTime($data['meta_updated_timestamp']));

        return $car;
    }

    /**
     * @param array<mixed> $data
     * @return Occurrence
     */
    private function mapOccurrence(array $data): Occurrence
    {
        $first = $this->stringToDateTime($data['first_occurence']);
        $last = $this->stringToDateTime($data['last_occurence']);

        return $this->factory->createOccurrence($first, $last);
    }

    /**
     * @param array<mixed> $data
     * @return Price
     */
    private function mapPrice(array $data): Price
    {
        $price = $this->factory->createPrice(
            $data['price_with_vat'],
            $data['currency'],
            $data['price_with_vat_czk'],
            $data['price_with_vat_eur']
        );
        $price->setChange($data['price_change'])
            ->setRetailPriceCzk($data['retail_price_czk'])
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
        $seller = $this->factory->creteSeller($data['seller']['name']);
        $rating = $this->factory->createRating($data['seller']['rating_average'], $data['seller']['rating_count']);
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
    private function mapMeasure(array $data): Measure
    {
        $measure = $this->factory->createMeasure();
        $measure->setCarRank($data['measure_car_rank'])
            ->setCountRelevantCar($data['measure_count_relevant_car'])
            ->setDelta($data['measure_delta'])
            ->setLevel($data['measure_level'])
            ->setLiquidity($data['measure_liquidity'])
            ->setRate($data['measure_rate'])
            ->setRelativePricePosition($data['measure_relative_price_position'])
            ->setRetailPricePosition($data['measure_retail_price_position'])
            ->setSoldRangeCategory($data['measure_sold_range_category'])
            ->setTotalScore($data['measure_total_score']);

        return $measure;
    }
}

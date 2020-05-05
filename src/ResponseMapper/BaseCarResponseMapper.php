<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\BaseCar;
use Teas\AlphaApiClient\DataObject\Response\Occurrence;
use Teas\AlphaApiClient\DataObject\Response\Price;
use Teas\AlphaApiClient\DataObject\Response\Seller;
use Teas\AlphaApiClient\Factory\ResponseDataObjectFactory;
use Teas\AlphaApiClient\Traits\NullableDateTimeTrait;

class BaseCarResponseMapper extends AbstractResponseMapper
{
    use NullableDateTimeTrait;

    /**
     * @var UrlResponseMapper
     */
    private $urlResponseMapper;

    /**
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
     * @param BaseCar $car
     */
    public function fillBaseCarData(array $data, BaseCar $car): void
    {
        $car->setAdId($data['ad_id'])
            ->setBodyType($data['body_type'])
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
            ->setSeller($this->mapSeller($data))
            ->setServer($data['server'])
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
}

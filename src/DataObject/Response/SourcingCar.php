<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use DateTimeImmutable;
use Teas\AlphaApiClient\DataObject\DataObjectInterface;
use Teas\AlphaApiClient\Traits\NullableDateTimeTrait;

/**
 * Class SourcingCar
 * @SuppressWarnings(PHPMD.TooManyFields)
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
class SourcingCar implements DataObjectInterface
{
    use NullableDateTimeTrait;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string|null
     */
    private $adId;

    /**
     * @var string|null
     */
    private $bodyType;

    /**
     * @var string|null
     */
    private $buyerCountry;

    /**
     * @var string|null
     */
    private $condition;

    /**
     * @var int|null
     */
    private $cubicCapacity;

    /**
     * @var int|null
     */
    private $daysOnStock;

    /**
     * @var string|null
     */
    private $driveType;

    /**
     * @var float|null
     */
    private $featureScore;

    /**
     * @var array<string>
     */
    private $features = [];

    /**
     * @var Occurrence
     */
    private $occurrence;

    /**
     * @var string|null
     */
    private $fuelType;

    /**
     * @var string|null
     */
    private $interiorMaterial;

    /**
     * @var string
     */
    private $make;

    /**
     * @var int|null
     */
    private $mileage;

    /**
     * @var DateTimeImmutable|null
     */
    private $metaUpdated;

    /**
     * @var Url
     */
    private $mobileDeUrl;

    /**
     * @var string|null;
     */
    private $model;

    /**
     * @var int|null
     */
    private $numberOfSeats;

    /**
     * @var string|null
     */
    private $originCountry;

    /**
     * @var int|null
     */
    private $power;

    /**
     * @var Price
     */
    private $price;

    /**
     * @var Url
     */
    private $sAutoUrl;

    /**
     * @var Seller
     */
    private $seller;

    /**
     * @var string|null
     */
    private $server;

    /**
     * @var float|null
     */
    private $sumRelativePriceDifference;

    /**
     * @var DateTimeImmutable|null
     */
    private $technicalInspectionValidTo;

    /**
     * @var string|null
     */
    private $transmission;

    /**
     * @var Url
     */
    private $url;

    /**
     * @var string|null;
     */
    private $vin;

    /**
     * @var int|null
     */
    private $year;

    /**
     * @var Measure
     */
    private $measure;

    /**
     * SourcingCar constructor.
     * @param string $pk
     */
    public function __construct(string $pk)
    {
        $this->id = $pk;
    }

    /**
     * @param string $id
     * @return SourcingCar
     */
    public function setId(string $id): SourcingCar
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getAdId(): ?string
    {
        return $this->adId;
    }

    /**
     * @param string|null $adId
     * @return SourcingCar
     */
    public function setAdId(?string $adId): SourcingCar
    {
        $this->adId = $adId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBodyType(): ?string
    {
        return $this->bodyType;
    }

    /**
     * @param string|null $bodyType
     * @return SourcingCar
     */
    public function setBodyType(?string $bodyType): SourcingCar
    {
        $this->bodyType = $bodyType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBuyerCountry(): ?string
    {
        return $this->buyerCountry;
    }

    /**
     * @param string|null $buyerCountry
     * @return SourcingCar
     */
    public function setBuyerCountry(?string $buyerCountry): SourcingCar
    {
        $this->buyerCountry = $buyerCountry;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCondition(): ?string
    {
        return $this->condition;
    }

    /**
     * @param string|null $condition
     * @return SourcingCar
     */
    public function setCondition(?string $condition): SourcingCar
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCubicCapacity(): ?int
    {
        return $this->cubicCapacity;
    }

    /**
     * @param int|null $cubicCapacity
     * @return SourcingCar
     */
    public function setCubicCapacity(?int $cubicCapacity): SourcingCar
    {
        $this->cubicCapacity = $cubicCapacity;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDaysOnStock(): ?int
    {
        return $this->daysOnStock;
    }

    /**
     * @param int|null $daysOnStock
     * @return SourcingCar
     */
    public function setDaysOnStock(?int $daysOnStock): SourcingCar
    {
        $this->daysOnStock = $daysOnStock;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDriveType(): ?string
    {
        return $this->driveType;
    }

    /**
     * @param string|null $driveType
     * @return SourcingCar
     */
    public function setDriveType(?string $driveType): SourcingCar
    {
        $this->driveType = $driveType;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getFeatureScore(): ?float
    {
        return $this->featureScore;
    }

    /**
     * @param float|null $featureScore
     * @return SourcingCar
     */
    public function setFeatureScore(?float $featureScore): SourcingCar
    {
        $this->featureScore = $featureScore;

        return $this;
    }

    /**
     * @return array<string>
     */
    public function getFeatures(): array
    {
        return $this->features;
    }

    /**
     * @param array<string> $features
     * @return SourcingCar
     */
    public function setFeatures(array $features): SourcingCar
    {
        $this->features = $features;

        return $this;
    }

    /**
     * @return Occurrence
     */
    public function getOccurrence(): Occurrence
    {
        return $this->occurrence;
    }

    /**
     * @param Occurrence $occurrence
     * @return SourcingCar
     */
    public function setOccurrence(Occurrence $occurrence): SourcingCar
    {
        $this->occurrence = $occurrence;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFuelType(): ?string
    {
        return $this->fuelType;
    }

    /**
     * @param string|null $fuelType
     * @return SourcingCar
     */
    public function setFuelType(?string $fuelType): SourcingCar
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInteriorMaterial(): ?string
    {
        return $this->interiorMaterial;
    }

    /**
     * @param string|null $interiorMaterial
     * @return SourcingCar
     */
    public function setInteriorMaterial(?string $interiorMaterial): SourcingCar
    {
        $this->interiorMaterial = $interiorMaterial;

        return $this;
    }

    /**
     * @return string
     */
    public function getMake(): string
    {
        return $this->make;
    }

    /**
     * @param string $make
     * @return SourcingCar
     */
    public function setMake(string $make): SourcingCar
    {
        $this->make = $make;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    /**
     * @param int|null $mileage
     * @return SourcingCar
     */
    public function setMileage(?int $mileage): SourcingCar
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getMetaUpdated(): ?DateTimeImmutable
    {
        return $this->metaUpdated;
    }

    /**
     * @param DateTimeImmutable|null $metaUpdated
     * @return SourcingCar
     */
    public function setMetaUpdated(?DateTimeImmutable $metaUpdated): SourcingCar
    {
        $this->metaUpdated = $metaUpdated;

        return $this;
    }

    /**
     * @return Url
     */
    public function getMobileDeUrl(): Url
    {
        return $this->mobileDeUrl;
    }

    /**
     * @param Url $mobileDeUrl
     * @return SourcingCar
     */
    public function setMobileDeUrl(Url $mobileDeUrl): SourcingCar
    {
        $this->mobileDeUrl = $mobileDeUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param string|null $model
     * @return SourcingCar
     */
    public function setModel(?string $model): SourcingCar
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNumberOfSeats(): ?int
    {
        return $this->numberOfSeats;
    }

    /**
     * @param int|null $numberOfSeats
     * @return SourcingCar
     */
    public function setNumberOfSeats(?int $numberOfSeats): SourcingCar
    {
        $this->numberOfSeats = $numberOfSeats;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOriginCountry(): ?string
    {
        return $this->originCountry;
    }

    /**
     * @param string|null $originCountry
     * @return SourcingCar
     */
    public function setOriginCountry(?string $originCountry): SourcingCar
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPower(): ?int
    {
        return $this->power;
    }

    /**
     * @param int|null $power
     * @return SourcingCar
     */
    public function setPower(?int $power): SourcingCar
    {
        $this->power = $power;

        return $this;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price
    {
        return $this->price;
    }

    /**
     * @param Price $price
     * @return SourcingCar
     */
    public function setPrice(Price $price): SourcingCar
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Url
     */
    public function getSAutoUrl(): Url
    {
        return $this->sAutoUrl;
    }

    /**
     * @param Url $sAutoUrl
     * @return SourcingCar
     */
    public function setSAutoUrl(Url $sAutoUrl): SourcingCar
    {
        $this->sAutoUrl = $sAutoUrl;

        return $this;
    }

    /**
     * @return Seller
     */
    public function getSeller(): Seller
    {
        return $this->seller;
    }

    /**
     * @param Seller $seller
     * @return SourcingCar
     */
    public function setSeller(Seller $seller): SourcingCar
    {
        $this->seller = $seller;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getServer(): ?string
    {
        return $this->server;
    }

    /**
     * @param string|null $server
     * @return SourcingCar
     */
    public function setServer(?string $server): SourcingCar
    {
        $this->server = $server;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSumRelativePriceDifference(): ?float
    {
        return $this->sumRelativePriceDifference;
    }

    /**
     * @param float|null $sumRelativePriceDifference
     * @return SourcingCar
     */
    public function setSumRelativePriceDifference(?float $sumRelativePriceDifference): SourcingCar
    {
        $this->sumRelativePriceDifference = $sumRelativePriceDifference;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getTechnicalInspectionValidTo(): ?DateTimeImmutable
    {
        return $this->technicalInspectionValidTo;
    }

    /**
     * @param DateTimeImmutable|null $technicalInspectionValidTo
     * @return SourcingCar
     */
    public function setTechnicalInspectionValidTo(?DateTimeImmutable $technicalInspectionValidTo): SourcingCar
    {
        $this->technicalInspectionValidTo = $technicalInspectionValidTo;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    /**
     * @param string|null $transmission
     * @return SourcingCar
     */
    public function setTransmission(?string $transmission): SourcingCar
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * @return Url
     */
    public function getUrl(): Url
    {
        return $this->url;
    }

    /**
     * @param Url $url
     * @return SourcingCar
     */
    public function setUrl(Url $url): SourcingCar
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVin(): ?string
    {
        return $this->vin;
    }

    /**
     * @param string|null $vin
     * @return SourcingCar
     */
    public function setVin(?string $vin): SourcingCar
    {
        $this->vin = $vin;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * @param int|null $year
     * @return SourcingCar
     */
    public function setYear(?int $year): SourcingCar
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return Measure
     */
    public function getMeasure(): Measure
    {
        return $this->measure;
    }

    /**
     * @param Measure $measure
     * @return SourcingCar
     */
    public function setMeasure(Measure $measure): SourcingCar
    {
        $this->measure = $measure;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'ad_id' => $this->adId,
            'body_type' => $this->bodyType,
            'buyer_country' => $this->buyerCountry,
            'condition' => $this->condition,
            'cubic_capacity' => $this->cubicCapacity,
            'days_on_stock' => $this->daysOnStock,
            'drive_type' => $this->driveType,
            'feature_score' => $this->featureScore,
            'features' => $this->features,
            'occurrence' => $this->occurrence->toArray(),
            'fuel_type' => $this->fuelType,
            'interior_material' => $this->interiorMaterial,
            'make' => $this->make,
            'measure' => $this->measure->toArray(),
            'meta_updated' => $this->nullableDateTimeToString(
                $this->metaUpdated,
                DATE_ATOM
            ),
            'mileage' => $this->mileage,
            'mobile_de_url' => $this->mobileDeUrl->toArray(),
            'model' => $this->model,
            'number_of_seats' => $this->numberOfSeats,
            'origin_country' => $this->originCountry,
            'power' => $this->power,
            'price' => $this->price->toArray(),
            'sauto_url' => $this->sAutoUrl->toArray(),
            'seller' => $this->seller->toArray(),
            'server' => $this->server,
            'sum_relative_price_difference' => $this->sumRelativePriceDifference,
            'technical_inspection_valid_to' => $this->nullableDateTimeToString(
                $this->technicalInspectionValidTo,
                'Y-m-d'
            ),
            'transmission' => $this->transmission,
            'url' => $this->url->toArray(),
            'vin' => $this->vin,
            'year' => $this->year,
        ];
    }
}

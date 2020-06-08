<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use DateTimeImmutable;
use Teas\AlphaApiClient\Traits\NullableDateTimeTrait;

/**
 * @SuppressWarnings(PHPMD.TooManyFields)
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
abstract class AbstractBaseCar implements CarInterface
{
    use NullableDateTimeTrait;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $adId;

    /**
     * @var string|null
     */
    protected $carStyle;

    /**
     * @var string|null
     */
    protected $condition;

    /**
     * @var int|null
     */
    protected $cubicCapacity;

    /**
     * @var int|null
     */
    protected $daysOnStock;

    /**
     * @var string|null
     */
    protected $driveType;

    /**
     * @var float|null
     */
    protected $featureScore;

    /**
     * @var array<string>
     */
    protected $features = [];

    /**
     * @var Occurrence
     */
    protected $occurrence;

    /**
     * @var string|null
     */
    protected $fuelType;

    /**
     * @var string|null
     */
    protected $interiorMaterial;

    /**
     * @var string|null
     */
    protected $make;

    /**
     * @var DateTimeImmutable|null
     */
    protected $metaUpdated;

    /**
     * @var int|null
     */
    protected $mileage;

    /**
     * @var Url
     */
    protected $mobileDeUrl;

    /**
     * @var string|null;
     */
    protected $model;

    /**
     * @var int|null
     */
    protected $numberOfSeats;

    /**
     * @var string|null
     */
    protected $originCountry;

    /**
     * @var int|null
     */
    protected $power;

    /**
     * @var Price
     */
    protected $price;

    /**
     * @var Url
     */
    protected $sAutoUrl;

    /**
     * @var Seller
     */
    protected $seller;

    /**
     * @var string|null
     */
    protected $server;

    /**
     * @var float|null
     */
    protected $sumRelativePriceDifference;

    /**
     * @var DateTimeImmutable|null
     */
    protected $technicalInspectionValidTo;

    /**
     * @var Url
     */
    protected $thumbnailUrl;

    /**
     * @var string|null
     */
    protected $transmission;

    /**
     * @var Url
     */
    protected $url;

    /**
     * @var string|null;
     */
    protected $vin;

    /**
     * @var int|null
     */
    protected $year;

    /**
     * @param string $pk
     */
    public function __construct(string $pk)
    {
        $this->id = $pk;
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
     * @return self
     */
    public function setAdId(?string $adId): self
    {
        $this->adId = $adId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCarStyle(): ?string
    {
        return $this->carStyle;
    }

    /**
     * @param string|null $carStyle
     * @return self
     */
    public function setCarStyle(?string $carStyle): self
    {
        $this->carStyle = $carStyle;

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
     * @return self
     */
    public function setCondition(?string $condition): self
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
     * @return self
     */
    public function setCubicCapacity(?int $cubicCapacity): self
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
     * @return self
     */
    public function setDaysOnStock(?int $daysOnStock): self
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
     * @return self
     */
    public function setDriveType(?string $driveType): self
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
     * @return self
     */
    public function setFeatureScore(?float $featureScore): self
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
     * @return self
     */
    public function setFeatures(array $features): self
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
     * @return self
     */
    public function setOccurrence(Occurrence $occurrence): self
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
     * @return self
     */
    public function setFuelType(?string $fuelType): self
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
     * @return self
     */
    public function setInteriorMaterial(?string $interiorMaterial): self
    {
        $this->interiorMaterial = $interiorMaterial;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMake(): ?string
    {
        return $this->make;
    }

    /**
     * @param string|null $make
     * @return self
     */
    public function setMake(?string $make): self
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
     * @return self
     */
    public function setMileage(?int $mileage): self
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
     * @return self
     */
    public function setMetaUpdated(?DateTimeImmutable $metaUpdated): self
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
     * @return self
     */
    public function setMobileDeUrl(Url $mobileDeUrl): self
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
     * @return self
     */
    public function setModel(?string $model): self
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
     * @return self
     */
    public function setNumberOfSeats(?int $numberOfSeats): self
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
     * @return self
     */
    public function setOriginCountry(?string $originCountry): self
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
     * @return self
     */
    public function setPower(?int $power): self
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
     * @return self
     */
    public function setPrice(Price $price): self
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
     * @return self
     */
    public function setSAutoUrl(Url $sAutoUrl): self
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
     * @return self
     */
    public function setSeller(Seller $seller): self
    {
        $this->seller = $seller;

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
     * @return self
     */
    public function setSumRelativePriceDifference(?float $sumRelativePriceDifference): self
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
     * @return self
     */
    public function setTechnicalInspectionValidTo(?DateTimeImmutable $technicalInspectionValidTo): self
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
     * @return self
     */
    public function setTransmission(?string $transmission): self
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
     * @return self
     */
    public function setUrl(Url $url): self
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
     * @return self
     */
    public function setVin(?string $vin): self
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
     * @return self
     */
    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return Url
     */
    public function getThumbnailUrl(): Url
    {
        return $this->thumbnailUrl;
    }

    /**
     * @param Url $thumbnailUrl
     * @return self
     */
    public function setThumbnailUrl(Url $thumbnailUrl): self
    {
        $this->thumbnailUrl = $thumbnailUrl;

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
     * @return self
     */
    public function setServer(?string $server): self
    {
        $this->server = $server;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'adId' => $this->adId,
            'carStyle' => $this->carStyle,
            'condition' => $this->condition,
            'cubicCapacity' => $this->cubicCapacity,
            'daysOnStock' => $this->daysOnStock,
            'driveType' => $this->driveType,
            'featureScore' => $this->featureScore,
            'features' => $this->features,
            'occurrence' => $this->occurrence->toArray(),
            'fuelType' => $this->fuelType,
            'interiorMaterial' => $this->interiorMaterial,
            'make' => $this->make,
            'metaUpdated' => $this->nullableDateTimeToString(
                $this->metaUpdated,
                DATE_ATOM
            ),
            'mileage' => $this->mileage,
            'mobileDeUrl' => $this->mobileDeUrl->toArray(),
            'model' => $this->model,
            'numberOfSeats' => $this->numberOfSeats,
            'originCountry' => $this->originCountry,
            'power' => $this->power,
            'price' => $this->price->toArray(),
            'sAutoUrl' => $this->sAutoUrl->toArray(),
            'server' => $this->server,
            'seller' => $this->seller->toArray(),
            'sumRelativePriceDifference' => $this->sumRelativePriceDifference,
            'technicalInspectionValidTo' => $this->nullableDateTimeToString(
                $this->technicalInspectionValidTo,
                'Y-m-d'
            ),
            'thumbnailUrl' => $this->thumbnailUrl->toArray(),
            'transmission' => $this->transmission,
            'url' => $this->url->toArray(),
            'vin' => $this->vin,
            'year' => $this->year,
        ];
    }
}

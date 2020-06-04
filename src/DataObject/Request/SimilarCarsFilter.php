<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Request;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class SimilarCarsFilter implements DataObjectInterface
{
    /**
     * @var string|null
     */
    private $make;

    /**
     * @var string|null
     */
    private $modelFamily;

    /**
     * @var int|null
     */
    private $year;

    /**
     * @var string|null
     */
    private $carStyle;

    /**
     * @var string|null
     */
    private $currency;

    /**
     * @var string|null
     */
    private $fuelType;

    /**
     * @var string|null
     */
    private $sellerCountry;

    /**
     * @var int|null
     */
    private $power;

    /**
     * @var string|null
     */
    private $drive;

    /**
     * @var string|null
     */
    private $transmission;

    /**
     * @var int|null
     */
    private $mileage;

    /**
     * @return string|null
     */
    public function getMake(): ?string
    {
        return $this->make;
    }

    /**
     * @param string|null $make
     */
    public function setMake(?string $make): void
    {
        $this->make = $make;
    }

    /**
     * @return string|null
     */
    public function getModelFamily(): ?string
    {
        return $this->modelFamily;
    }

    /**
     * @param string|null $modelFamily
     */
    public function setModelFamily(?string $modelFamily): void
    {
        $this->modelFamily = $modelFamily;
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
     */
    public function setYear(?int $year): void
    {
        $this->year = $year;
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
     */
    public function setCarStyle(?string $carStyle): void
    {
        $this->carStyle = $carStyle;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     */
    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
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
     */
    public function setFuelType(?string $fuelType): void
    {
        $this->fuelType = $fuelType;
    }

    /**
     * @return string|null
     */
    public function getSellerCountry(): ?string
    {
        return $this->sellerCountry;
    }

    /**
     * @param string|null $sellerCountry
     */
    public function setSellerCountry(?string $sellerCountry): void
    {
        $this->sellerCountry = $sellerCountry;
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
     */
    public function setPower(?int $power): void
    {
        $this->power = $power;
    }

    /**
     * @return string|null
     */
    public function getDrive(): ?string
    {
        return $this->drive;
    }

    /**
     * @param string|null $drive
     */
    public function setDrive(?string $drive): void
    {
        $this->drive = $drive;
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
     */
    public function setTransmission(?string $transmission): void
    {
        $this->transmission = $transmission;
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
     */
    public function setMileage(?int $mileage): void
    {
        $this->mileage = $mileage;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'make' => $this->make,
            'model_family' => $this->modelFamily,
            'year' => $this->year,
            'car_style' => $this->carStyle,
            'currency' => $this->currency,
            'fuel_type' => $this->fuelType,
            'seller_country' => $this->sellerCountry,
            'power' => $this->power,
            'drive' => $this->drive,
            'transmission' => $this->transmission,
            'mileage' => $this->mileage,
        ];
    }
}

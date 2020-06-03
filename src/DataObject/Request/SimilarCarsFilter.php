<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Request;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class SimilarCarsFilter implements DataObjectInterface
{
    /**
     * @var string
     */
    private $make;

    /**
     * @var string
     */
    private $modelFamily;

    /**
     * @var int
     */
    private $year;

    /**
     * @var string
     */
    private $carStyle;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $fuelType;

    /**
     * @var string
     */
    private $sellerCountry;

    /**
     * @var int
     */
    private $power;

    /**
     * @var string
     */
    private $drive;

    /**
     * @var string
     */
    private $transmission;

    /**
     * @var int
     */
    private $mileage;

    /**
     * @return string
     */
    public function getMake(): string
    {
        return $this->make;
    }

    /**
     * @param string $make
     */
    public function setMake(string $make): void
    {
        $this->make = $make;
    }

    /**
     * @return string
     */
    public function getModelFamily(): string
    {
        return $this->modelFamily;
    }

    /**
     * @param string $modelFamily
     */
    public function setModelFamily(string $modelFamily): void
    {
        $this->modelFamily = $modelFamily;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getCarStyle(): string
    {
        return $this->carStyle;
    }

    /**
     * @param string $carStyle
     */
    public function setCarStyle(string $carStyle): void
    {
        $this->carStyle = $carStyle;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getFuelType(): string
    {
        return $this->fuelType;
    }

    /**
     * @param string $fuelType
     */
    public function setFuelType(string $fuelType): void
    {
        $this->fuelType = $fuelType;
    }

    /**
     * @return string
     */
    public function getSellerCountry(): string
    {
        return $this->sellerCountry;
    }

    /**
     * @param string $sellerCountry
     */
    public function setSellerCountry(string $sellerCountry): void
    {
        $this->sellerCountry = $sellerCountry;
    }

    /**
     * @return int
     */
    public function getPower(): int
    {
        return $this->power;
    }

    /**
     * @param int $power
     */
    public function setPower(int $power): void
    {
        $this->power = $power;
    }

    /**
     * @return string
     */
    public function getDrive(): string
    {
        return $this->drive;
    }

    /**
     * @param string $drive
     */
    public function setDrive(string $drive): void
    {
        $this->drive = $drive;
    }

    /**
     * @return string
     */
    public function getTransmission(): string
    {
        return $this->transmission;
    }

    /**
     * @param string $transmission
     */
    public function setTransmission(string $transmission): void
    {
        $this->transmission = $transmission;
    }

    /**
     * @return int
     */
    public function getMileage(): int
    {
        return $this->mileage;
    }

    /**
     * @param int $mileage
     */
    public function setMileage(int $mileage): void
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

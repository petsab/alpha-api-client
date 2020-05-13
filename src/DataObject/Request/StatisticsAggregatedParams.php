<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Request;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

final class StatisticsAggregatedParams implements DataObjectInterface
{
    /**
     * @var array<string>
     */
    private $make = [];

    /**
     * @var array<string>
     */
    private $model = [];

    /**
     * @var array<int>
     */
    private $year = [];

    /**
     * @var array<string>
     */
    private $transmission = [];

    /**
     * @var array<string>
     */
    private $fuelType = [];

    /**
     * @var array<string>
     */
    private $drive = [];

    /**
     * @var string|null
     */
    private $currency;

    /**
     * @var array<string>
     */
    private $power = [];

    /**
     * @var array<string>
     */
    private $mileageRange = [];

    /**
     * @return array<string>
     */
    public function getMake(): array
    {
        return $this->make;
    }

    /**
     * @param array<string> $make
     */
    public function setMake(array $make): void
    {
        $this->make = $make;
    }

    /**
     * @return array<string>
     */
    public function getModel(): array
    {
        return $this->model;
    }

    /**
     * @param array<string> $model
     */
    public function setModel(array $model): void
    {
        $this->model = $model;
    }

    /**
     * @return array<int>
     */
    public function getYear(): array
    {
        return $this->year;
    }

    /**
     * @param array<int> $year
     */
    public function setYear(array $year): void
    {
        $this->year = $year;
    }

    /**
     * @return array<string>
     */
    public function getTransmission(): array
    {
        return $this->transmission;
    }

    /**
     * @param array<string> $transmission
     */
    public function setTransmission(array $transmission): void
    {
        $this->transmission = $transmission;
    }

    /**
     * @return array<string>
     */
    public function getFuelType(): array
    {
        return $this->fuelType;
    }

    /**
     * @param array<string> $fuelType
     */
    public function setFuelType(array $fuelType): void
    {
        $this->fuelType = $fuelType;
    }

    /**
     * @return array<string>
     */
    public function getDrive(): array
    {
        return $this->drive;
    }

    /**
     * @param array<string> $drive
     */
    public function setDrive(array $drive): void
    {
        $this->drive = $drive;
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
     * @return array<string>
     */
    public function getPower(): array
    {
        return $this->power;
    }

    /**
     * @param array<string> $power
     */
    public function setPower(array $power): void
    {
        $this->power = $power;
    }

    /**
     * @return array<string>
     */
    public function getMileageRange(): array
    {
        return $this->mileageRange;
    }

    /**
     * @param array<string> $mileageRange
     */
    public function setMileageRange(array $mileageRange): void
    {
        $this->mileageRange = $mileageRange;
    }

    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function toArray(): array
    {
        $data = [];
        if (!empty($this->make)) {
            $data['make'] = $this->make;
        }
        if (!empty($this->model)) {
            $data['model'] = $this->model;
        }
        if (!empty($this->year)) {
            $data['year'] = $this->year;
        }
        if (!empty($this->transmission)) {
            $data['transmission'] = $this->transmission;
        }
        if (!empty($this->fuelType)) {
            $data['fuel_type'] = $this->fuelType;
        }
        if (!empty($this->drive)) {
            $data['drive'] = $this->drive;
        }
        if (null !== $this->currency) {
            $data['currency'] = $this->currency;
        }
        if (!empty($this->power)) {
            $data['power'] = $this->power;
        }
        if (!empty($this->mileageRange)) {
            $data['mileage_range'] = $this->mileageRange;
        }

        return $data;
    }
}

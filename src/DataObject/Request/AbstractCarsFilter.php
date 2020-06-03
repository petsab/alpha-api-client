<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Request;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

abstract class AbstractCarsFilter implements DataObjectInterface
{
    /**
     * @var FilterSeller
     */
    protected $seller;

    /**
     * @var IntegerRange|null
     */
    protected $price;

    /**
     * @var IntegerRange|null
     */
    protected $daysOnStock;

    /**
     * @var array<FilterCar>
     */
    protected $car;

    /**
     * @var array<string>
     */
    protected $fuelType = [];

    /**
     * @var string|null
     */
    protected $transmission;

    /**
     * @var array<string>
     */
    protected $bodyType = [];

    /**
     * @var string|null
     */
    protected $driveType;

    /**
     * @var IntegerRange|null
     */
    protected $mileageRange;

    /**
     * @var IntegerRange|null
     */
    protected $year;

    /**
     * @var IntegerRange|null
     */
    protected $power;

    /**
     * @var IntegerRange|null
     */
    protected $cubicCapacity;

    /**
     * @param FilterSeller $seller
     */
    public function __construct(FilterSeller $seller)
    {
        $this->seller = $seller;
    }

    /**
     * @param IntegerRange|null $price
     */
    public function setPrice(?IntegerRange $price): void
    {
        $this->price = $price;
    }

    /**
     * @param IntegerRange|null $daysOnStock
     */
    public function setDaysOnStock(?IntegerRange $daysOnStock): void
    {
        $this->daysOnStock = $daysOnStock;
    }

    /**
     * @param array<FilterCar> $cars
     */
    public function setCar(array $cars): void
    {
        $this->car = $cars;
    }

    /**
     * @param array<string> $fuelType
     */
    public function setFuelType(array $fuelType): void
    {
        $this->fuelType = $fuelType;
    }

    /**
     * @param string|null $transmission
     */
    public function setTransmission(?string $transmission): void
    {
        $this->transmission = $transmission;
    }

    /**
     * @param string|null $driveType
     */
    public function setDriveType(?string $driveType): void
    {
        $this->driveType = $driveType;
    }

    /**
     * @param IntegerRange|null $mileageRange
     */
    public function setMileageRange(?IntegerRange $mileageRange): void
    {
        $this->mileageRange = $mileageRange;
    }

    /**
     * @param IntegerRange|null $year
     */
    public function setYear(?IntegerRange $year): void
    {
        $this->year = $year;
    }

    /**
     * @param IntegerRange|null $power
     */
    public function setPower(?IntegerRange $power): void
    {
        $this->power = $power;
    }

    /**
     * @param IntegerRange|null $cubicCapacity
     */
    public function setCubicCapacity(?IntegerRange $cubicCapacity): void
    {
        $this->cubicCapacity = $cubicCapacity;
    }

    /**
     * @param array<string> $bodyType
     */
    public function setBodyType(array $bodyType): void
    {
        $this->bodyType = $bodyType;
    }

    /**
     * @return FilterSeller
     */
    public function getSeller(): FilterSeller
    {
        return $this->seller;
    }

    /**
     * @return IntegerRange|null
     */
    public function getPrice(): ?IntegerRange
    {
        return $this->price;
    }

    /**
     * @return IntegerRange|null
     */
    public function getDaysOnStock(): ?IntegerRange
    {
        return $this->daysOnStock;
    }

    /**
     * @return array<FilterCar>
     */
    public function getCar(): array
    {
        return $this->car;
    }

    /**
     * @return array<string>
     */
    public function getFuelType(): array
    {
        return $this->fuelType;
    }

    /**
     * @return string|null
     */
    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    /**
     * @return string|null
     */
    public function getDriveType(): ?string
    {
        return $this->driveType;
    }

    /**
     * @return IntegerRange|null
     */
    public function getMileageRange(): ?IntegerRange
    {
        return $this->mileageRange;
    }

    /**
     * @return IntegerRange|null
     */
    public function getYear(): ?IntegerRange
    {
        return $this->year;
    }

    /**
     * @return IntegerRange|null
     */
    public function getPower(): ?IntegerRange
    {
        return $this->power;
    }

    /**
     * @return IntegerRange|null
     */
    public function getCubicCapacity(): ?IntegerRange
    {
        return $this->cubicCapacity;
    }

    /**
     * @return array<string>
     */
    public function getBodyType(): array
    {
        return $this->bodyType;
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
        if (!empty($this->seller)) {
            $data['seller'] = $this->seller->toArray();
        }
        if (!empty($this->price)) {
            $data['price'] = $this->price->toArray();
        }
        if (!empty($this->daysOnStock)) {
            $data['days_on_stock'] = $this->daysOnStock->toArray();
        }
        if (!empty($this->car)) {
            $data['car'] = array_map(function (FilterCar $car) {
                return $car->toArray();
            }, $this->car);
        }
        if (!empty($this->fuelType)) {
            $data['fuel_type'] = $this->fuelType;
        }
        if (!empty($this->transmission)) {
            $data['transmission'] = $this->transmission;
        }
        if (!empty($this->bodyType)) {
            $data['body_type'] = $this->bodyType;
        }
        if (!empty($this->driveType)) {
            $data['drive_type'] = $this->driveType;
        }
        if (!empty($this->mileageRange)) {
            $data['mileage_range'] = $this->mileageRange->toArray();
        }
        if (!empty($this->year)) {
            $data['year'] = $this->year->toArray();
        }
        if (!empty($this->power)) {
            $data['power'] = $this->power->toArray();
        }
        if (!empty($this->cubicCapacity)) {
            $data['cubic_capacity'] = $this->cubicCapacity->toArray();
        }

        return $data;
    }
}

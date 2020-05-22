<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Request;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

/**
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class AvailableCarsFilter implements DataObjectInterface
{
    /**
     * @var FilterSeller
     */
    private $seller;

    /**
     * @var IntegerRange|null
     */
    private $price;

    /**
     * @var IntegerRange|null
     */
    private $daysOnStock;

    /**
     * @var array<FilterCar>
     */
    private $car;

    /**
     * @var array<string>
     */
    private $fuelType = [];

    /**
     * @var string|null
     */
    private $transmission;

    /**
     * @var array<string>
     */
    private $bodyType = [];

    /**
     * @var string|null
     */
    private $driveType;

    /**
     * @var IntegerRange|null
     */
    private $mileageRange;

    /**
     * @var IntegerRange|null
     */
    private $year;

    /**
     * @var IntegerRange|null
     */
    private $power;

    /**
     * @var IntegerRange|null
     */
    private $cubicCapacity;

    /**
     * @var FilterBuyer
     */
    private $buyer;

    /**
     * @var IntegerRange|null
     */
    private $margin;

    /**
     * @var FloatRange|null
     */
    private $position;

    /**
     * @var IntegerRange|null
     */
    private $turnover;

    /**
     * @var IntegerRange|null
     */
    private $uniformity;

    /**
     * @param FilterSeller $seller
     * @param FilterBuyer $buyer
     */
    public function __construct(FilterSeller $seller, FilterBuyer $buyer)
    {
        $this->seller = $seller;
        $this->buyer = $buyer;
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
     * @param array<string> $bodyType
     */
    public function setBodyType(array $bodyType): void
    {
        $this->bodyType = $bodyType;
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
     * @param IntegerRange|null $margin
     */
    public function setMargin(?IntegerRange $margin): void
    {
        $this->margin = $margin;
    }

    /**
     * @param FloatRange|null $position
     */
    public function setPosition(?FloatRange $position): void
    {
        $this->position = $position;
    }

    /**
     * @param IntegerRange|null $turnover
     */
    public function setTurnover(?IntegerRange $turnover): void
    {
        $this->turnover = $turnover;
    }

    /**
     * @param IntegerRange|null $uniformity
     */
    public function setUniformity(?IntegerRange $uniformity): void
    {
        $this->uniformity = $uniformity;
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
     * @return array<string>
     */
    public function getBodyType(): array
    {
        return $this->bodyType;
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
     * @return FilterBuyer
     */
    public function getBuyer(): FilterBuyer
    {
        return $this->buyer;
    }

    /**
     * @return IntegerRange|null
     */
    public function getMargin(): ?IntegerRange
    {
        return $this->margin;
    }

    /**
     * @return FloatRange|null
     */
    public function getPosition(): ?FloatRange
    {
        return $this->position;
    }

    /**
     * @return IntegerRange|null
     */
    public function getTurnover(): ?IntegerRange
    {
        return $this->turnover;
    }

    /**
     * @return IntegerRange|null
     */
    public function getUniformity(): ?IntegerRange
    {
        return $this->uniformity;
    }

    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function toArray(): array
    {
        $data = [
            'buyer' => $this->buyer->toArray(),
            'seller' => $this->seller->toArray(),
        ];
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
        if (!empty($this->margin)) {
            $data['margin'] = $this->margin->toArray();
        }
        if (!empty($this->position)) {
            $data['position'] = $this->position->toArray();
        }
        if (!empty($this->turnover)) {
            $data['turnover'] = $this->turnover->toArray();
        }
        if (!empty($this->uniformity)) {
            $data['uniformity'] = $this->uniformity->toArray();
        }

        return $data;
    }
}

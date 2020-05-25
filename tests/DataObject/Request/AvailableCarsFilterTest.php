<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Request;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\AvailableCarsFilter;
use Teas\AlphaApiClient\DataObject\Request\FilterBuyer;
use Teas\AlphaApiClient\DataObject\Request\FilterCar;
use Teas\AlphaApiClient\DataObject\Request\FilterSeller;
use Teas\AlphaApiClient\DataObject\Request\FloatRange;
use Teas\AlphaApiClient\DataObject\Request\IntegerRange;

class AvailableCarsFilterTest extends TestCase
{
    public function testAllValues()
    {
        $seller = $this->createMock(FilterSeller::class);
        $sellerData = [
            'country' => [uniqid(), uniqid()],
            'server' => uniqid(),
            'type' => uniqid(),
            'ranking' => (float) rand() / (float) getrandmax(),
        ];
        $seller->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn($sellerData);

        $buyer = $this->createMock(FilterBuyer::class);
        $buyerData = [
            'country' => uniqid(),
            'branch' => [
                'address' => uniqid(),
                'zip' => uniqid(),
            ],
        ];
        $buyer->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn($buyerData);

        $filter = new AvailableCarsFilter($seller, $buyer);
        $this->assertSame($seller, $filter->getSeller());
        $this->assertSame($buyer, $filter->getBuyer());
        $data = [
            'buyer' => $buyerData,
            'seller' => $sellerData,
        ];
        $this->assertEquals($data, $filter->toArray());

        $price = $this->createIntegerRange();
        $filter->setPrice($price);
        $this->assertSame($price, $filter->getPrice());

        $daysOnStock = $this->createIntegerRange();
        $filter->setDaysOnStock($daysOnStock);
        $this->assertSame($daysOnStock, $filter->getDaysOnStock());

        $car1 = $this->createMock(FilterCar::class);
        $car1Data = [
            'make' => uniqid(),
            'model' => uniqid(),
            'year' => rand(2000, 2020),
        ];
        $car1->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn($car1Data);
        $car2 = $this->createMock(FilterCar::class);
        $car2Data = [
            'make' => uniqid(),
            'model' => uniqid(),
            'year' => rand(2000, 2020),
        ];
        $car2->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn($car2Data);
        $cars = [$car1, $car2];
        $filter->setCar($cars);
        $this->assertSame($cars, $filter->getCar());

        $fuelType = [uniqid(), uniqid()];
        $filter->setFuelType($fuelType);
        $this->assertSame($fuelType, $filter->getFuelType());

        $transmission = uniqid();
        $filter->setTransmission($transmission);
        $this->assertSame($transmission, $filter->getTransmission());

        $bodyType = [uniqid(), uniqid()];
        $filter->setBodyType($bodyType);
        $this->assertSame($bodyType, $filter->getBodyType());

        $driveType = uniqid();
        $filter->setDriveType($driveType);
        $this->assertSame($driveType, $filter->getDriveType());

        $mileageRange = $this->createIntegerRange();
        $filter->setMileageRange($mileageRange);
        $this->assertSame($mileageRange, $filter->getMileageRange());

        $year = $this->createIntegerRange();
        $filter->setYear($year);
        $this->assertSame($year, $filter->getYear());

        $power = $this->createIntegerRange();
        $filter->setPower($power);
        $this->assertSame($power, $filter->getPower());

        $cubicCapacity = $this->createIntegerRange();
        $filter->setCubicCapacity($cubicCapacity);
        $this->assertSame($cubicCapacity, $filter->getCubicCapacity());

        $margin = $this->createIntegerRange();
        $filter->setMargin($margin);
        $this->assertSame($margin, $filter->getMargin());

        $position = $this->createFloatRange();
        $filter->setPosition($position);
        $this->assertSame($position, $filter->getPosition());

        $turnover = $this->createIntegerRange();
        $filter->setTurnover($turnover);
        $this->assertSame($turnover, $filter->getTurnover());

        $uniformity = $this->createIntegerRange();
        $filter->setUniformity($uniformity);
        $this->assertSame($uniformity, $filter->getUniformity());

        $data = [
            'buyer' => $buyerData,
            'seller' => $sellerData,
            'price' => $price->toArray(),
            'days_on_stock' => $daysOnStock->toArray(),
            'car' => array_map(function (FilterCar $car) {
                return $car->toArray();
            }, $cars),
            'fuel_type' => $fuelType,
            'transmission' => $transmission,
            'body_type' => $bodyType,
            'drive_type' => $driveType,
            'year' => $year->toArray(),
            'power' => $power->toArray(),
            'cubic_capacity' => $cubicCapacity->toArray(),
            'margin' => $margin->toArray(),
            'mileage_range' => $mileageRange->toArray(),
            'position' => $position->toArray(),
            'turnover' => $turnover->toArray(),
            'uniformity' => $uniformity->toArray(),
        ];
        $this->assertEquals($data, $filter->toArray());
    }

    public function testAllEmpty()
    {
        $filter = new AvailableCarsFilter(null, null);
        $this->assertEquals([], $filter->toArray());
    }

    private function createIntegerRange(): IntegerRange
    {
        return new IntegerRange(rand(1, 100), rand(1, 100));
    }

    private function createFloatRange(): FloatRange
    {
        return new FloatRange(
            (float) rand() / (float) getrandmax(),
            (float) rand() / (float) getrandmax()
        );
    }
}

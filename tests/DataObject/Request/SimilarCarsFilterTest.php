<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Request;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\IntegerRange;
use Teas\AlphaApiClient\DataObject\Request\SimilarCarsFilter;

class SimilarCarsFilterTest extends TestCase
{
    public function testAll()
    {
        $make = uniqid();
        $modelFamily = uniqid();
        $year = rand(2000, 2020);
        $carStyle = uniqid();
        $currency = uniqid();
        $fuelType = uniqid();
        $sellerCountry = uniqid();
        $power = rand(50, 200);
        $drive = uniqid();
        $transmission = uniqid();
        $mileage = rand(50000, 200000);

        $filter = new SimilarCarsFilter();
        $filter->setMake($make);
        $filter->setModelFamily($modelFamily);
        $filter->setYear($year);
        $filter->setCarStyle($carStyle);
        $filter->setCurrency($currency);
        $filter->setFuelType($fuelType);
        $filter->setSellerCountry($sellerCountry);
        $filter->setPower($power);
        $filter->setDrive($drive);
        $filter->setTransmission($transmission);
        $filter->setMileage($mileage);
        $data = [
            'make' => $filter->getMake(),
            'model_family' => $filter->getModelFamily(),
            'year' => $filter->getYear(),
            'car_style' => $filter->getCarStyle(),
            'currency' => $filter->getCurrency(),
            'fuel_type' => $filter->getFuelType(),
            'seller_country' => $filter->getSellerCountry(),
            'power' => $filter->getPower(),
            'drive' => $filter->getDrive(),
            'transmission' => $filter->getTransmission(),
            'mileage' => $filter->getMileage(),
        ];
        $this->assertSame($data, $filter->toArray());
    }
}

<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Request;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\StatisticsAggregatedParams;

class StatisticsAggregatedParamsTest extends TestCase
{
    public function testAll()
    {
        $instance = new StatisticsAggregatedParams();
        $this->assertEquals([], $instance->toArray());

        $make = $this->getRandomStringArray();
        $instance->setMake($make);
        $this->assertEquals($make, $instance->getMake());

        $model = $this->getRandomStringArray();
        $instance->setModel($model);
        $this->assertEquals($model, $instance->getModel());

        $year = $this->getRandomIntArray();
        $instance->setYear($year);
        $this->assertEquals($year, $instance->getYear());

        $transmission = $this->getRandomStringArray();
        $instance->setTransmission($transmission);
        $this->assertEquals($transmission, $instance->getTransmission());

        $fuelType = $this->getRandomStringArray();
        $instance->setFuelType($fuelType);
        $this->assertEquals($fuelType, $instance->getFuelType());

        $drive = $this->getRandomStringArray();
        $instance->setDrive($drive);
        $this->assertEquals($drive, $instance->getDrive());

        $currency = uniqid();
        $instance->setCurrency($currency);
        $this->assertEquals($currency, $instance->getCurrency());

        $power = $this->getRandomStringArray();
        $instance->setPower($power);
        $this->assertEquals($power, $instance->getPower());

        $mileageRange = $this->getRandomStringArray();
        $instance->setMileageRange($mileageRange);
        $this->assertEquals($mileageRange, $instance->getMileageRange());

        $this->assertEquals(
            [
                'make' => $make,
                'model' => $model,
                'year' => $year,
                'transmission' => $transmission,
                'fuel_type' => $fuelType,
                'drive' => $drive,
                'currency' => $currency,
                'power' => $power,
                'mileage_range' => $mileageRange,
            ],
            $instance->toArray()
        );
    }

    private function getRandomStringArray(): array
    {
        $array = [];
        for ($i = 0; $i < rand(1, 5); $i++) {
            $array[] = uniqid();
        }

        return $array;
    }

    private function getRandomIntArray(): array
    {
        $array = [];
        for ($i = 0; $i < rand(1, 5); $i++) {
            $array[] = rand(1900, 2020);
        }

        return $array;
    }
}

<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Request;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\FilterCar;

class FilterCarTest extends TestCase
{
    public function testAllValues()
    {
        $make = uniqid();
        $model = uniqid();
        $year = rand(2000, 2020);
        $car = new FilterCar($make, $model, $year);
        $this->assertSame($make, $car->getMake());
        $this->assertSame($model, $car->getModel());
        $this->assertSame($year, $car->getYear());
        $data = [
            'make' => $make,
            'model' => $model,
            'year' => $year,
        ];
        $this->assertSame($data, $car->toArray());
    }

    public function testOnlyMake()
    {
        $make = uniqid();
        $car = new FilterCar($make);
        $this->assertSame($make, $car->getMake());
        $this->assertNull($car->getModel());
        $this->assertNull($car->getYear());
        $data = [
            'make' => $make,
        ];
        $this->assertSame($data, $car->toArray());
    }

    public function testWithoutYear()
    {
        $make = uniqid();
        $model = uniqid();
        $car = new FilterCar($make, $model);
        $data = [
            'make' => $make,
            'model' => $model,
        ];
        $this->assertSame($data, $car->toArray());
    }

    public function testOnlyYear()
    {
        $year = rand(2000, 2020);
        $car = new FilterCar(null, null, $year);
        $data = [
            'year' => $year,
        ];
        $this->assertSame($data, $car->toArray());
    }
}

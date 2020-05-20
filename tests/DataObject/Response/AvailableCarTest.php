<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Measure;
use Teas\AlphaApiClient\DataObject\Response\Occurrence;
use Teas\AlphaApiClient\DataObject\Response\Price;
use Teas\AlphaApiClient\DataObject\Response\Seller;
use Teas\AlphaApiClient\DataObject\Response\AvailableCar;
use Teas\AlphaApiClient\DataObject\Response\Url;

class AvailableCarTest extends TestCase
{
    public function testAll()
    {
        $id = uniqid();
        $adId = uniqid();
        $carStyle = uniqid();
        $condition = uniqid();
        $cubicCapacity = rand(1, 100);
        $daysOnStock = rand(1, 100);
        $drive = uniqid();
        $featureScore = (float) rand(1, 100);
        $features = [];
        $premiumFeatures = [];
        for ($i = 0; $i < rand(5, 10); $i++) {
            $features[] = uniqid();
            $premiumFeatures[] = uniqid();
        }
        $fuelType = uniqid();
        $interiorMaterial = uniqid();
        $make = uniqid();
        $mileage = rand(1, 100);
        $metaUpdated = new DateTimeImmutable();
        $model = uniqid();
        $numberOfSeats = rand(1, 100);
        $originCountry = uniqid();
        $power = rand(1, 100);
        $server = uniqid();
        $sumRelativePriceDifference = (float) rand(1, 100);
        $technicalInspectionValidTo = new DateTimeImmutable();
        $transmission = uniqid();
        $vin = uniqid();
        $year = rand(1, 100);

        $occurrence = $this->createMock(Occurrence::class);
        $occurrenceData = [
            'first' => uniqid(),
            'last' => uniqid(),
        ];
        $occurrence->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn($occurrenceData);

        $mobileDeUrl = $this->createMock(Url::class);
        $mobileDeUrl->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn(['full' => uniqid()]);

        $price = $this->createMock(Price::class);
        $priceData = [
            'change' => (float) rand(1, 100),
            'withVat' => rand(1, 100),
            'withVatCzk' => rand(1, 100),
            'withVatEur' => rand(1, 100),
            'retailPriceCzk' => rand(1, 100),
            'vatRate' => rand(1, 100),
            'vatReclaimable' => rand(1, 10) > 5,
            'currency' => uniqid(),
        ];
        $price->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn($priceData);

        $sAutoUrl = $this->createMock(Url::class);
        $sAutoUrl->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn(['full' => uniqid()]);

        $seller = $this->createMock(Seller::class);
        $sellerData = [
            'name' => uniqid(),
            'type' => uniqid(),
            'address' => uniqid(),
            'city' => uniqid(),
            'zip' => uniqid(),
            'country' => uniqid(),
            'email' => uniqid(),
            'phone' => uniqid(),
            'rating' => uniqid(),
        ];
        $seller->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn($sellerData);

        $url = $this->createMock(Url::class);
        $url->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn(['full' => uniqid()]);

        $measure = $this->createMock(Measure::class);
        $measureData = [
            'carRank' => uniqid(),
            'countRelevantCar' => uniqid(),
            'delta' => uniqid(),
            'level' => uniqid(),
            'liquidity' => uniqid(),
            'ppLevel' => uniqid(),
            'rate' => uniqid(),
            'relativePricePosition' => uniqid(),
            'retailPricePosition' => uniqid(),
            'soldRangeCategory' => uniqid(),
            'totalScore' => uniqid(),
        ];
        $measure->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn($measureData);

        $thumbUrl = $this->createMock(Url::class);
        $thumbUrl->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn(['full' => uniqid()]);

        $availableCar = new AvailableCar($id);
        $availableCar->setAdId($adId)
            ->setCondition($condition)
            ->setCarStyle($carStyle)
            ->setCondition($condition)
            ->setCubicCapacity($cubicCapacity)
            ->setDaysOnStock($daysOnStock)
            ->setDriveType($drive)
            ->setFeatureScore($featureScore)
            ->setFeatures($features)
            ->setOccurrence($occurrence)
            ->setFuelType($fuelType)
            ->setInteriorMaterial($interiorMaterial)
            ->setMake($make)
            ->setMileage($mileage)
            ->setMetaUpdated($metaUpdated)
            ->setMobileDeUrl($mobileDeUrl)
            ->setModel($model)
            ->setNumberOfSeats($numberOfSeats)
            ->setOriginCountry($originCountry)
            ->setPower($power)

            ->setPrice($price)
            ->setSAutoUrl($sAutoUrl)
            ->setSeller($seller)
            ->setServer($server)
            ->setSumRelativePriceDifference($sumRelativePriceDifference)
            ->setTechnicalInspectionValidTo($technicalInspectionValidTo)
            ->setTransmission($transmission)
            ->setUrl($url)
            ->setVin($vin)
            ->setYear($year)
            ->setThumbnailUrl($thumbUrl);
        $availableCar->setPremiumFeatures($premiumFeatures)
            ->setMeasure($measure);


        $data = [
            'id' => $availableCar->getId(),
            'adId' => $availableCar->getAdId(),
            'carStyle' => $availableCar->getCarStyle(),
            'condition' => $availableCar->getCondition(),
            'cubicCapacity' => $availableCar->getCubicCapacity(),
            'daysOnStock' => $availableCar->getDaysOnStock(),
            'driveType' => $availableCar->getDriveType(),
            'featureScore' => $availableCar->getFeatureScore(),
            'features' => $availableCar->getFeatures(),
            'occurrence' => $availableCar->getOccurrence()->toArray(),
            'fuelType' => $availableCar->getFuelType(),
            'interiorMaterial' => $availableCar->getInteriorMaterial(),
            'make' => $availableCar->getMake(),
            'measure' => $availableCar->getMeasure()->toArray(),
            'metaUpdated' => $availableCar->getMetaUpdated()->format(DATE_ATOM),
            'mileage' => $availableCar->getMileage(),
            'mobileDeUrl' => $availableCar->getMobileDeUrl()->toArray(),
            'model' => $availableCar->getModel(),
            'numberOfSeats' => $availableCar->getNumberOfSeats(),
            'originCountry' => $availableCar->getOriginCountry(),
            'power' => $availableCar->getPower(),
            'premiumFeatures' => $availableCar->getPremiumFeatures(),
            'price' => $availableCar->getPrice()->toArray(),
            'sAutoUrl' => $availableCar->getSAutoUrl()->toArray(),
            'seller' => $availableCar->getSeller()->toArray(),
            'server' => $availableCar->getServer(),
            'sumRelativePriceDifference' => $availableCar->getSumRelativePriceDifference(),
            'technicalInspectionValidTo' => $availableCar->getTechnicalInspectionValidTo()->format('Y-m-d'),
            'thumbnailUrl' => $availableCar->getThumbnailUrl()->toArray(),
            'transmission' => $availableCar->getTransmission(),
            'url' => $availableCar->getUrl()->toArray(),
            'vin' => $availableCar->getVin(),
            'year' => $availableCar->getYear(),
        ];

        $this->assertEquals($data, $availableCar->toArray());
    }
}

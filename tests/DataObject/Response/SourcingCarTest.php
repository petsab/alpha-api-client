<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Measure;
use Teas\AlphaApiClient\DataObject\Response\Occurrence;
use Teas\AlphaApiClient\DataObject\Response\Price;
use Teas\AlphaApiClient\DataObject\Response\Seller;
use Teas\AlphaApiClient\DataObject\Response\SourcingCar;
use Teas\AlphaApiClient\DataObject\Response\Url;

class SourcingCarTest extends TestCase
{
    public function testAll()
    {
        $id = uniqid();
        $adId = uniqid();
        $bodyType = uniqid();
        $buyerCountry = uniqid();
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

        $sourcingCar = new SourcingCar($id);
        $sourcingCar->setAdId($adId)
            ->setCondition($condition)
            ->setBodyType($bodyType)
            ->setBuyerCountry($buyerCountry)
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
            ->setPremiumFeatures($premiumFeatures)
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
            ->setMeasure($measure)
            ->setThumbnailUrl($thumbUrl);

        $data = [
            'id' => $sourcingCar->getId(),
            'adId' => $sourcingCar->getAdId(),
            'bodyType' => $sourcingCar->getBodyType(),
            'buyerCountry' => $sourcingCar->getBuyerCountry(),
            'condition' => $sourcingCar->getCondition(),
            'cubicCapacity' => $sourcingCar->getCubicCapacity(),
            'daysOnStock' => $sourcingCar->getDaysOnStock(),
            'driveType' => $sourcingCar->getDriveType(),
            'featureScore' => $sourcingCar->getFeatureScore(),
            'features' => $sourcingCar->getFeatures(),
            'occurrence' => $sourcingCar->getOccurrence()->toArray(),
            'fuelType' => $sourcingCar->getFuelType(),
            'interiorMaterial' => $sourcingCar->getInteriorMaterial(),
            'make' => $sourcingCar->getMake(),
            'measure' => $sourcingCar->getMeasure()->toArray(),
            'metaUpdated' => $sourcingCar->getMetaUpdated()->format(DATE_ATOM),
            'mileage' => $sourcingCar->getMileage(),
            'mobileDeUrl' => $sourcingCar->getMobileDeUrl()->toArray(),
            'model' => $sourcingCar->getModel(),
            'numberOfSeats' => $sourcingCar->getNumberOfSeats(),
            'originCountry' => $sourcingCar->getOriginCountry(),
            'power' => $sourcingCar->getPower(),
            'premiumFeatures' => $sourcingCar->getPremiumFeatures(),
            'price' => $sourcingCar->getPrice()->toArray(),
            'sAutoUrl' => $sourcingCar->getSAutoUrl()->toArray(),
            'seller' => $sourcingCar->getSeller()->toArray(),
            'server' => $sourcingCar->getServer(),
            'sumRelativePriceDifference' => $sourcingCar->getSumRelativePriceDifference(),
            'technicalInspectionValidTo' => $sourcingCar->getTechnicalInspectionValidTo()->format('Y-m-d'),
            'thumbnailUrl' => $sourcingCar->getThumbnailUrl()->toArray(),
            'transmission' => $sourcingCar->getTransmission(),
            'url' => $sourcingCar->getUrl()->toArray(),
            'vin' => $sourcingCar->getVin(),
            'year' => $sourcingCar->getYear(),
        ];

        $this->assertSame($data, $sourcingCar->toArray());
    }
}

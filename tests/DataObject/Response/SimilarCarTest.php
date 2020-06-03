<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Car;
use Teas\AlphaApiClient\DataObject\Response\Occurrence;
use Teas\AlphaApiClient\DataObject\Response\Price;
use Teas\AlphaApiClient\DataObject\Response\Seller;
use Teas\AlphaApiClient\DataObject\Response\SimilarCar;
use Teas\AlphaApiClient\DataObject\Response\Similarity;
use Teas\AlphaApiClient\DataObject\Response\SoldCar;
use Teas\AlphaApiClient\DataObject\Response\Url;

class SimilarCarTest extends TestCase
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
        for ($i = 0; $i < rand(5, 10); $i++) {
            $features[] = uniqid();
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

        $thumbUrl = $this->createMock(Url::class);
        $thumbUrl->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn(['full' => uniqid()]);

        $similarity = $this->createMock(Similarity::class);
        $similarityData = [
            'level' => rand(1, 10),
            'score' => (float)rand() / (float)getrandmax(),
        ];
        $similarity->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn($similarityData);

        $car = new SimilarCar($id);
        $car->setAdId($adId)
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
            ->setServer($server)
            ->setSeller($seller)
            ->setSumRelativePriceDifference($sumRelativePriceDifference)
            ->setTechnicalInspectionValidTo($technicalInspectionValidTo)
            ->setTransmission($transmission)
            ->setUrl($url)
            ->setVin($vin)
            ->setYear($year)
            ->setThumbnailUrl($thumbUrl);
        $car->setSimilarity($similarity);

        $data = [
            'id' => $car->getId(),
            'adId' => $car->getAdId(),
            'carStyle' => $car->getCarStyle(),
            'condition' => $car->getCondition(),
            'cubicCapacity' => $car->getCubicCapacity(),
            'daysOnStock' => $car->getDaysOnStock(),
            'driveType' => $car->getDriveType(),
            'featureScore' => $car->getFeatureScore(),
            'features' => $car->getFeatures(),
            'occurrence' => $car->getOccurrence()->toArray(),
            'fuelType' => $car->getFuelType(),
            'interiorMaterial' => $car->getInteriorMaterial(),
            'make' => $car->getMake(),
            'metaUpdated' => $car->getMetaUpdated()->format(DATE_ATOM),
            'mileage' => $car->getMileage(),
            'mobileDeUrl' => $car->getMobileDeUrl()->toArray(),
            'model' => $car->getModel(),
            'numberOfSeats' => $car->getNumberOfSeats(),
            'originCountry' => $car->getOriginCountry(),
            'power' => $car->getPower(),
            'price' => $car->getPrice()->toArray(),
            'sAutoUrl' => $car->getSAutoUrl()->toArray(),
            'server' => $car->getServer(),
            'seller' => $car->getSeller()->toArray(),
            'sumRelativePriceDifference' => $car->getSumRelativePriceDifference(),
            'technicalInspectionValidTo' => $car->getTechnicalInspectionValidTo()->format('Y-m-d'),
            'thumbnailUrl' => $car->getThumbnailUrl()->toArray(),
            'transmission' => $car->getTransmission(),
            'url' => $car->getUrl()->toArray(),
            'vin' => $car->getVin(),
            'year' => $car->getYear(),
            'similarity' => $car->getSimilarity()->toArray(),
        ];

        $this->assertEquals($data, $car->toArray());
    }
}

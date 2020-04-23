<?php

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
            'with_vat' => rand(1, 100),
            'with_vat_czk' => rand(1, 100),
            'with_vat_eur' => rand(1, 100),
            'retail_price_czk' => rand(1, 100),
            'vat_rate' => rand(1, 100),
            'vat_reclaimable' => rand(1, 10) > 5,
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
            'car_rank' => uniqid(),
            'count_relevant_car' => uniqid(),
            'delta' => uniqid(),
            'level' => uniqid(),
            'liquidity' => uniqid(),
            'pp_level' => uniqid(),
            'rate' => uniqid(),
            'relative_price_position' => uniqid(),
            'retail_price_position' => uniqid(),
            'sold_range_category' => uniqid(),
            'total_score' => uniqid(),
        ];
        $measure->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn($measureData);

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
            ->setMeasure($measure);

        $data = [
            'id' => $sourcingCar->getId(),
            'ad_id' => $sourcingCar->getAdId(),
            'body_type' => $sourcingCar->getBodyType(),
            'buyer_country' => $sourcingCar->getBuyerCountry(),
            'condition' => $sourcingCar->getCondition(),
            'cubic_capacity' => $sourcingCar->getCubicCapacity(),
            'days_on_stock' => $sourcingCar->getDaysOnStock(),
            'drive_type' => $sourcingCar->getDriveType(),
            'feature_score' => $sourcingCar->getFeatureScore(),
            'features' => $sourcingCar->getFeatures(),
            'occurrence' => $sourcingCar->getOccurrence()->toArray(),
            'fuel_type' => $sourcingCar->getFuelType(),
            'interior_material' => $sourcingCar->getInteriorMaterial(),
            'make' => $sourcingCar->getMake(),
            'measure' => $sourcingCar->getMeasure()->toArray(),
            'meta_updated' => $sourcingCar->getMetaUpdated()->format(DATE_ATOM),
            'mileage' => $sourcingCar->getMileage(),
            'mobile_de_url' => $sourcingCar->getMobileDeUrl()->toArray(),
            'model' => $sourcingCar->getModel(),
            'number_of_seats' => $sourcingCar->getNumberOfSeats(),
            'origin_country' => $sourcingCar->getOriginCountry(),
            'power' => $sourcingCar->getPower(),
            'price' => $sourcingCar->getPrice()->toArray(),
            'sauto_url' => $sourcingCar->getSAutoUrl()->toArray(),
            'seller' => $sourcingCar->getSeller()->toArray(),
            'server' => $sourcingCar->getServer(),
            'sum_relative_price_difference' => $sourcingCar->getSumRelativePriceDifference(),
            'technical_inspection_valid_to' => $sourcingCar->getTechnicalInspectionValidTo()->format('Y-m-d'),
            'transmission' => $sourcingCar->getTransmission(),
            'url' => $sourcingCar->getUrl()->toArray(),
            'vin' => $sourcingCar->getVin(),
            'year' => $sourcingCar->getYear(),
        ];

        $this->assertSame($data, $sourcingCar->toArray());
    }
}

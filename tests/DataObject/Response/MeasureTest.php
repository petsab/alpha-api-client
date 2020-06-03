<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Measure;
use Teas\AlphaApiClient\DataObject\Response\Percentile;

class MeasureTest extends TestCase
{
    public function testAll()
    {
        $carRank = rand(1, 100);
        $countRelevantCar = rand(1, 100);
        $delta = rand(1, 100);
        $level = rand(1, 100);
        $liquidity = (float) rand(1, 100);
        $ppLevel = rand(1, 100);
        $rate = (float) rand(1, 100);
        $relativePricePosition = (float) rand(1, 100);
        $retailPricePosition = rand(1, 100);
        $soldCategoryRange = uniqid();
        $totalScore = (float) rand(1, 100);
        $percentile = $this->createMock(Percentile::class);
        $percentileData = [
            'value0' => (float) rand() / (float) getrandmax(),
            'value10' => (float) rand() / (float) getrandmax(),
            'value20' => (float) rand() / (float) getrandmax(),
            'value30' => (float) rand() / (float) getrandmax(),
            'value40' => (float) rand() / (float) getrandmax(),
            'value50' => (float) rand() / (float) getrandmax(),
            'value60' => (float) rand() / (float) getrandmax(),
            'value70' => (float) rand() / (float) getrandmax(),
            'value80' => (float) rand() / (float) getrandmax(),
            'value90' => (float) rand() / (float) getrandmax(),
            'value100' => (float) rand() / (float) getrandmax(),
        ];
        $percentile->expects(self::exactly(2))
            ->method('toArray')
            ->willReturn($percentileData);

        $measure = new Measure();
        $measure->setCarRank($carRank)
            ->setCountRelevantCar($countRelevantCar)
            ->setDelta($delta)
            ->setLevel($level)
            ->setLiquidity($liquidity)
            ->setPpLevel($ppLevel)
            ->setRate($rate)
            ->setRelativePricePosition($relativePricePosition)
            ->setRetailPricePosition($retailPricePosition)
            ->setSoldRangeCategory($soldCategoryRange)
            ->setTotalScore($totalScore)
            ->setPercentile($percentile);


        $this->assertSame($carRank, $measure->getCarRank());
        $this->assertSame($countRelevantCar, $measure->getCountRelevantCar());
        $this->assertSame($delta, $measure->getDelta());
        $this->assertSame($level, $measure->getLevel());
        $this->assertSame($liquidity, $measure->getLiquidity());
        $this->assertSame($ppLevel, $measure->getPpLevel());
        $this->assertSame($rate, $measure->getRate());
        $this->assertSame($relativePricePosition, $measure->getRelativePricePosition());
        $this->assertSame($retailPricePosition, $measure->getRetailPricePosition());
        $this->assertSame($soldCategoryRange, $measure->getSoldRangeCategory());
        $this->assertSame($totalScore, $measure->getTotalScore());
        $this->assertSame($percentile, $measure->getPercentile());

        $data = [
            'carRank' => $measure->getCarRank(),
            'countRelevantCar' => $measure->getCountRelevantCar(),
            'delta' => $measure->getDelta(),
            'level' => $measure->getLevel(),
            'liquidity' => $measure->getLiquidity(),
            'ppLevel' => $measure->getPpLevel(),
            'rate' => $measure->getRate(),
            'relativePricePosition' => $measure->getRelativePricePosition(),
            'retailPricePosition' => $measure->getRetailPricePosition(),
            'soldRangeCategory' => $measure->getSoldRangeCategory(),
            'totalScore' => $measure->getTotalScore(),
            'percentile' => $measure->getPercentile()->toArray(),
        ];
        $this->assertSame($data, $measure->toArray());
    }
}

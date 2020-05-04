<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Measure;

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
            ->setTotalScore($totalScore);


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
        ];
        $this->assertSame($data, $measure->toArray());
    }
}

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class Measure implements DataObjectInterface
{
    /**
     * @var int|null
     */
    private $carRank;

    /**
     * @var int|null
     */
    private $countRelevantCar;

    /**
     * @var int|null
     */
    private $delta;

    /**
     * @var int|null
     */
    private $level;

    /**
     * @var float|null
     */
    private $liquidity;

    /**
     * @var int|null
     */
    private $ppLevel;

    /**
     * @var float|null
     */
    private $rate;

    /**
     * @var float|null
     */
    private $relativePricePosition;

    /**
     * @var int|null
     */
    private $retailPricePosition;

    /**
     * @var string|null
     */
    private $soldRangeCategory;

    /**
     * @var float|null
     */
    private $totalScore;

    /**
     * @return int|null
     */
    public function getCarRank(): ?int
    {
        return $this->carRank;
    }

    /**
     * @param int|null $carRank
     * @return Measure
     */
    public function setCarRank(?int $carRank): Measure
    {
        $this->carRank = $carRank;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCountRelevantCar(): ?int
    {
        return $this->countRelevantCar;
    }

    /**
     * @param int|null $countRelevantCar
     * @return Measure
     */
    public function setCountRelevantCar(?int $countRelevantCar): Measure
    {
        $this->countRelevantCar = $countRelevantCar;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDelta(): ?int
    {
        return $this->delta;
    }

    /**
     * @param int|null $delta
     * @return Measure
     */
    public function setDelta(?int $delta): Measure
    {
        $this->delta = $delta;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLevel(): ?int
    {
        return $this->level;
    }

    /**
     * @param int|null $level
     * @return Measure
     */
    public function setLevel(?int $level): Measure
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getLiquidity(): ?float
    {
        return $this->liquidity;
    }

    /**
     * @param float|null $liquidity
     * @return Measure
     */
    public function setLiquidity(?float $liquidity): Measure
    {
        $this->liquidity = $liquidity;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPpLevel(): ?int
    {
        return $this->ppLevel;
    }

    /**
     * @param int|null $ppLevel
     * @return Measure
     */
    public function setPpLevel(?int $ppLevel): Measure
    {
        $this->ppLevel = $ppLevel;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getRate(): ?float
    {
        return $this->rate;
    }

    /**
     * @param float|null $rate
     * @return Measure
     */
    public function setRate(?float $rate): Measure
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getRelativePricePosition(): ?float
    {
        return $this->relativePricePosition;
    }

    /**
     * @param float|null $relativePricePosition
     * @return Measure
     */
    public function setRelativePricePosition(?float $relativePricePosition): Measure
    {
        $this->relativePricePosition = $relativePricePosition;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRetailPricePosition(): ?int
    {
        return $this->retailPricePosition;
    }

    /**
     * @param int|null $retailPricePosition
     * @return Measure
     */
    public function setRetailPricePosition(?int $retailPricePosition): Measure
    {
        $this->retailPricePosition = $retailPricePosition;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSoldRangeCategory(): ?string
    {
        return $this->soldRangeCategory;
    }

    /**
     * @param string|null $soldRangeCategory
     * @return Measure
     */
    public function setSoldRangeCategory(?string $soldRangeCategory): Measure
    {
        $this->soldRangeCategory = $soldRangeCategory;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalScore(): ?float
    {
        return $this->totalScore;
    }

    /**
     * @param float|null $totalScore
     * @return Measure
     */
    public function setTotalScore(?float $totalScore): Measure
    {
        $this->totalScore = $totalScore;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'carRank' => $this->carRank,
            'countRelevantCar' => $this->countRelevantCar,
            'delta' => $this->delta,
            'level' => $this->level,
            'liquidity' => $this->liquidity,
            'ppLevel' => $this->ppLevel,
            'rate' => $this->rate,
            'relativePricePosition' => $this->relativePricePosition,
            'retailPricePosition' => $this->retailPricePosition,
            'soldRangeCategory' => $this->soldRangeCategory,
            'totalScore' => $this->totalScore,
        ];
    }
}

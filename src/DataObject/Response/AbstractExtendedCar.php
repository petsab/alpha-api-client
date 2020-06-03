<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

abstract class AbstractExtendedCar extends AbstractBaseCar
{
    /**
     * @var array<string>
     */
    private $premiumFeatures = [];

    /**
     * @var Measure|null
     */
    private $measure;

    /**
     * @var float|null
     */
    private $turnover;

    /**
     * @return Measure|null
     */
    public function getMeasure(): ?Measure
    {
        return $this->measure;
    }

    /**
     * @param Measure|null $measure
     * @return self
     */
    public function setMeasure(?Measure $measure): self
    {
        $this->measure = $measure;

        return $this;
    }

    /**
     * @return array<string>
     */
    public function getPremiumFeatures(): array
    {
        return $this->premiumFeatures;
    }

    /**
     * @param array<string> $premiumFeatures
     * @return self
     */
    public function setPremiumFeatures(array $premiumFeatures): self
    {
        $this->premiumFeatures = $premiumFeatures;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTurnover(): ?float
    {
        return $this->turnover;
    }

    /**
     * @param float|null $turnover
     * @return self
     */
    public function setTurnover(?float $turnover): self
    {
        $this->turnover = $turnover;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $data = parent::toArray();
        $data['premiumFeatures'] = $this->premiumFeatures;
        $data['measure'] = $this->measure ? $this->measure->toArray() : null;
        $data['turnover'] = $this->turnover;

        return $data;
    }
}

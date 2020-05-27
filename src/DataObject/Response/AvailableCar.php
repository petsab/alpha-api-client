<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

class AvailableCar extends BaseCar
{
    /**
     * @var array<string>
     */
    private $premiumFeatures = [];

    /**
     * @var Measure
     */
    private $measure;

    /**
     * @var Percentile
     */
    private $percentile;

    /**
     * @return Measure
     */
    public function getMeasure(): Measure
    {
        return $this->measure;
    }

    /**
     * @param Measure $measure
     * @return self
     */
    public function setMeasure(Measure $measure): self
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
     * @return Percentile
     */
    public function getPercentile(): Percentile
    {
        return $this->percentile;
    }

    /**
     * @param Percentile $percentile
     * @return AvailableCar
     */
    public function setPercentile(Percentile $percentile): AvailableCar
    {
        $this->percentile = $percentile;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $data = parent::toArray();
        $data['premiumFeatures'] = $this->premiumFeatures;
        $data['measure'] = $this->measure->toArray();
        $data['percentile'] = $this->percentile->toArray();

        return $data;
    }
}

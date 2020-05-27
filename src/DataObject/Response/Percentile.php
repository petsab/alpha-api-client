<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class Percentile implements DataObjectInterface
{
    /**
     * @var float|null
     */
    private $value0;

    /**
     * @var float|null
     */
    private $value10;

    /**
     * @var float|null
     */
    private $value20;

    /**
     * @var float|null
     */
    private $value30;

    /**
     * @var float|null
     */
    private $value40;

    /**
     * @var float|null
     */
    private $value50;

    /**
     * @var float|null
     */
    private $value60;

    /**
     * @var float|null
     */
    private $value70;

    /**
     * @var float|null
     */
    private $value80;

    /**
     * @var float|null
     */
    private $value90;

    /**
     * @var float|null
     */
    private $value100;

    /**
     * @return float|null
     */
    public function getValue0(): ?float
    {
        return $this->value0;
    }

    /**
     * @param float|null $value0
     * @return Percentile
     */
    public function setValue0(?float $value0): Percentile
    {
        $this->value0 = $value0;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue10(): ?float
    {
        return $this->value10;
    }

    /**
     * @param float|null $value10
     * @return Percentile
     */
    public function setValue10(?float $value10): Percentile
    {
        $this->value10 = $value10;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue20(): ?float
    {
        return $this->value20;
    }

    /**
     * @param float|null $value20
     * @return Percentile
     */
    public function setValue20(?float $value20): Percentile
    {
        $this->value20 = $value20;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue30(): ?float
    {
        return $this->value30;
    }

    /**
     * @param float|null $value30
     * @return Percentile
     */
    public function setValue30(?float $value30): Percentile
    {
        $this->value30 = $value30;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue40(): ?float
    {
        return $this->value40;
    }

    /**
     * @param float|null $value40
     * @return Percentile
     */
    public function setValue40(?float $value40): Percentile
    {
        $this->value40 = $value40;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue50(): ?float
    {
        return $this->value50;
    }

    /**
     * @param float|null $value50
     * @return Percentile
     */
    public function setValue50(?float $value50): Percentile
    {
        $this->value50 = $value50;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue60(): ?float
    {
        return $this->value60;
    }

    /**
     * @param float|null $value60
     * @return Percentile
     */
    public function setValue60(?float $value60): Percentile
    {
        $this->value60 = $value60;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue70(): ?float
    {
        return $this->value70;
    }

    /**
     * @param float|null $value70
     * @return Percentile
     */
    public function setValue70(?float $value70): Percentile
    {
        $this->value70 = $value70;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue80(): ?float
    {
        return $this->value80;
    }

    /**
     * @param float|null $value80
     * @return Percentile
     */
    public function setValue80(?float $value80): Percentile
    {
        $this->value80 = $value80;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue90(): ?float
    {
        return $this->value90;
    }

    /**
     * @param float|null $value90
     * @return Percentile
     */
    public function setValue90(?float $value90): Percentile
    {
        $this->value90 = $value90;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue100(): ?float
    {
        return $this->value100;
    }

    /**
     * @param float|null $value100
     * @return Percentile
     */
    public function setValue100(?float $value100): Percentile
    {
        $this->value100 = $value100;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'value0' => $this->value0,
            'value10' => $this->value10,
            'value20' => $this->value20,
            'value30' => $this->value30,
            'value40' => $this->value40,
            'value50' => $this->value50,
            'value60' => $this->value60,
            'value70' => $this->value70,
            'value80' => $this->value80,
            'value90' => $this->value90,
            'value100' => $this->value100,
        ];
    }
}

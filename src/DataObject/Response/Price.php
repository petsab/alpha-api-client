<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class Price implements DataObjectInterface
{
    /**
     * @var float|null
     */
    private $change;

    /**
     * @var int|null
     */
    private $withVat;

    /**
     * @var int|null
     */
    private $withVatCzk;

    /**
     * @var int|null
     */
    private $withVatEur;

    /**
     * @var int|null
     */
    private $retailPriceCzk;

    /**
     * @var int|null
     */
    private $vatRate;

    /**
     * @var bool
     */
    private $vatReclaimable;

    /**
     * @var string|null
     */
    private $currency;

    /**
     * @param int|null $withVat
     * @param string|null $currency
     * @param int|null $withVatCzk
     * @param int|null $withVatEur
     */
    public function __construct(?int $withVat, ?string $currency, ?int $withVatCzk, ?int $withVatEur)
    {
        $this->withVat = $withVat;
        $this->withVatCzk = $withVatCzk;
        $this->withVatEur = $withVatEur;
        $this->currency = $currency;
    }

    /**
     * @param float|null $change
     * @return Price
     */
    public function setChange(?float $change): Price
    {
        $this->change = $change;

        return $this;
    }

    /**
     * @param int|null $retailPriceCzk
     * @return Price
     */
    public function setRetailPriceCzk(?int $retailPriceCzk): Price
    {
        $this->retailPriceCzk = $retailPriceCzk;

        return $this;
    }

    /**
     * @param int|null $vatRate
     * @return Price
     */
    public function setVatRate(?int $vatRate): Price
    {
        $this->vatRate = $vatRate;

        return $this;
    }

    /**
     * @param bool $vatReclaimable
     * @return Price
     */
    public function setVatReclaimable(bool $vatReclaimable): Price
    {
        $this->vatReclaimable = $vatReclaimable;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getChange(): ?float
    {
        return $this->change;
    }

    /**
     * @return int|null
     */
    public function getWithVat(): ?int
    {
        return $this->withVat;
    }

    /**
     * @return int|null
     */
    public function getWithVatCzk(): ?int
    {
        return $this->withVatCzk;
    }

    /**
     * @return int|null
     */
    public function getWithVatEur(): ?int
    {
        return $this->withVatEur;
    }

    /**
     * @return int|null
     */
    public function getRetailPriceCzk(): ?int
    {
        return $this->retailPriceCzk;
    }

    /**
     * @return int|null
     */
    public function getVatRate(): ?int
    {
        return $this->vatRate;
    }

    /**
     * @return bool
     */
    public function isVatReclaimable(): bool
    {
        return $this->vatReclaimable;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'change' => $this->change,
            'withVat' => $this->withVat,
            'withVatCzk' => $this->withVatCzk,
            'withVatEur' => $this->withVatEur,
            'retailPriceCzk' => $this->retailPriceCzk,
            'vatRate' => $this->vatRate,
            'vatReclaimable' => $this->vatReclaimable,
            'currency' => $this->currency,
        ];
    }
}

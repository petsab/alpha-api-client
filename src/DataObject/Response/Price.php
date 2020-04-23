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
     * @var int
     */
    private $withVat;

    /**
     * @var int
     */
    private $withVatCzk;

    /**
     * @var int|null
     */
    private $withVatEur;

    /**
     * @var int
     */
    private $retailPriceCzk;

    /**
     * @var int
     */
    private $vatRate;

    /**
     * @var bool
     */
    private $vatReclaimable;

    /**
     * @var string
     */
    private $currency;

    /**
     * Price constructor.
     * @param int $withVat
     * @param string $currency
     * @param int $withVatCzk
     * @param int|null $withVatEur
     */
    public function __construct(int $withVat, string $currency, int $withVatCzk, ?int $withVatEur)
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
     * @param int $retailPriceCzk
     * @return Price
     */
    public function setRetailPriceCzk(int $retailPriceCzk): Price
    {
        $this->retailPriceCzk = $retailPriceCzk;

        return $this;
    }

    /**
     * @param int $vatRate
     * @return Price
     */
    public function setVatRate(int $vatRate): Price
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
     * @return int
     */
    public function getWithVat(): int
    {
        return $this->withVat;
    }

    /**
     * @return int
     */
    public function getWithVatCzk(): int
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
     * @return int
     */
    public function getRetailPriceCzk(): int
    {
        return $this->retailPriceCzk;
    }

    /**
     * @return int
     */
    public function getVatRate(): int
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
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'change' => $this->change,
            'with_vat' => $this->withVat,
            'with_vat_czk' => $this->withVatCzk,
            'with_vat_eur' => $this->withVatEur,
            'retail_price_czk' => $this->retailPriceCzk,
            'vat_rate' => $this->vatRate,
            'vat_reclaimable' => $this->vatReclaimable,
            'currency' => $this->currency,
        ];
    }
}

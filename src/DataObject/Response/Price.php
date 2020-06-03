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
     * @var string|null
     */
    private $originalCurrency;

    /**
     * @var int|null
     */
    private $originalWithVat;

    /**
     * @param int|null $withVat
     * @param string|null $currency
     * @param int|null $originalWithVat
     * @param string|null $originalCurrency
     */
    public function __construct(?int $withVat, ?string $currency, ?int $originalWithVat, ?string $originalCurrency)
    {
        $this->withVat = $withVat;
        $this->currency = $currency;
        $this->originalCurrency = $originalCurrency;
        $this->originalWithVat = $originalWithVat;
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
     * @return string|null
     */
    public function getOriginalCurrency(): ?string
    {
        return $this->originalCurrency;
    }

    /**
     * @return int|null
     */
    public function getOriginalWithVat(): ?int
    {
        return $this->originalWithVat;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'withVat' => $this->withVat,
            'vatRate' => $this->vatRate,
            'vatReclaimable' => $this->vatReclaimable,
            'currency' => $this->currency,
            'originalWithVat' => $this->originalWithVat,
            'originalCurrency' => $this->originalCurrency,
            'change' => $this->change,
        ];
    }
}

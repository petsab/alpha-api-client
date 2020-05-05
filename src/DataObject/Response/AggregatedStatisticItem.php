<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class AggregatedStatisticItem implements DataObjectInterface
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $amount;

    /**
     * @var float|null
     */
    private $mileage;

    /**
     * @var float|null
     */
    private $price;

    /**
     * AggregatedStatisticItem constructor.
     * @param string $type
     * @param int $amount
     * @param float|null $mileage
     * @param float|null $price
     */
    public function __construct(string $type, int $amount, ?float $mileage, ?float $price)
    {
        $this->type = $type;
        $this->amount = $amount;
        $this->mileage = $mileage;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return float|null
     */
    public function getMileage(): ?float
    {
        return $this->mileage;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'amount' => $this->amount,
            'mileage' => $this->mileage,
            'price' => $this->price,
        ];
    }
}

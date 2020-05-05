<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory;

use DateTimeImmutable;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatistic;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatisticItem;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatisticLevel;
use Teas\AlphaApiClient\DataObject\Response\Measure;
use Teas\AlphaApiClient\DataObject\Response\Occurrence;
use Teas\AlphaApiClient\DataObject\Response\Price;
use Teas\AlphaApiClient\DataObject\Response\Rating;
use Teas\AlphaApiClient\DataObject\Response\Seller;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\DataObject\Response\SourcingCar;
use Teas\AlphaApiClient\DataObject\Response\Url;

class ResponseDataObjectFactory
{
    /**
     * @param string $full
     * @return Url
     */
    public function createUrl(string $full): Url
    {
        return new Url($full);
    }

    /**
     * @param int|null $average
     * @param int|null $count
     * @return Rating
     */
    public function createRating(?int $average, ?int $count): Rating
    {
        return new Rating($average, $count);
    }

    /**
     * @param DateTimeImmutable|null $first
     * @param DateTimeImmutable|null $last
     * @return Occurrence
     */
    public function createOccurrence(?DateTimeImmutable $first, ?DateTimeImmutable $last): Occurrence
    {
        return new Occurrence($first, $last);
    }

    /**
     * @param int $withVat
     * @param string $currency
     * @param int $withVatCzk
     * @param int $withVatEur
     * @return Price
     */
    public function createPrice(
        int $withVat,
        string $currency,
        int $withVatCzk,
        int $withVatEur
    ): Price {
        return new Price($withVat, $currency, $withVatCzk, $withVatEur);
    }

    /**
     * @param string|null $name
     * @return Seller
     */
    public function creteSeller(?string $name): Seller
    {
        return new Seller($name);
    }

    /**
     * @param string $pk
     * @return SourcingCar
     */
    public function createSourcingCar(string $pk): SourcingCar
    {
        return new SourcingCar($pk);
    }

    /**
     * @param array<object> $data
     * @return SimpleList
     */
    public function createSimpleList(array $data): SimpleList
    {
        return new SimpleList($data);
    }

    /**
     * @return Measure
     */
    public function createMeasure(): Measure
    {
        return new Measure();
    }

    /**
     * @param string $name
     * @param string $value
     * @return AggregatedStatisticLevel
     */
    public function createAggregatedStatisticLevel(string $name, string $value): AggregatedStatisticLevel
    {
        return new AggregatedStatisticLevel($name, $value);
    }

    /**
     * @param string $type
     * @param int $amount
     * @param float|null $mileage
     * @param float|null $price
     * @return AggregatedStatisticItem
     */
    public function createAggregatedStatisticItem(
        string $type,
        int $amount,
        ?float $mileage,
        ?float $price
    ): AggregatedStatisticItem {
        return new AggregatedStatisticItem($type, $amount, $mileage, $price);
    }

    /**
     * @param array $levels
     * @param array $statistics
     * @return AggregatedStatistic
     */
    public function createAggregatedStatistic(array $levels, array $statistics): AggregatedStatistic
    {
        return new AggregatedStatistic($levels, $statistics);
    }
}

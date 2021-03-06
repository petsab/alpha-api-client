<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory\DataObject\Response;

use DateTimeImmutable;
use Teas\AlphaApiClient\DataObject\Response\AvailableCar;
use Teas\AlphaApiClient\DataObject\Response\Car;
use Teas\AlphaApiClient\DataObject\Response\Measure;
use Teas\AlphaApiClient\DataObject\Response\Occurrence;
use Teas\AlphaApiClient\DataObject\Response\Percentile;
use Teas\AlphaApiClient\DataObject\Response\Price;
use Teas\AlphaApiClient\DataObject\Response\Rating;
use Teas\AlphaApiClient\DataObject\Response\Seller;
use Teas\AlphaApiClient\DataObject\Response\SimilarCar;
use Teas\AlphaApiClient\DataObject\Response\Similarity;

class CarDOFactory
{
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
     * @param int|null $withVat
     * @param string|null $currency
     * @param int|null $originalWithVatCzk
     * @param string|null $originalCurrency
     * @return Price
     */
    public function createPrice(
        ?int $withVat,
        ?string $currency,
        ?int $originalWithVatCzk,
        ?string $originalCurrency
    ): Price {
        return new Price($withVat, $currency, $originalWithVatCzk, $originalCurrency);
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
     * @return AvailableCar
     */
    public function createAvailableCar(string $pk): AvailableCar
    {
        return new AvailableCar($pk);
    }

    /**
     * @return Measure
     */
    public function createMeasure(): Measure
    {
        return new Measure();
    }

    /**
     * @param string $pk
     * @return Car
     */
    public function createCar(string $pk): Car
    {
        return new Car($pk);
    }

    /**
     * @return Percentile
     */
    public function createPercentile(): Percentile
    {
        return new Percentile();
    }

    /**
     * @param int|null $level
     * @param float|null $score
     * @return Similarity
     */
    public function createSimilarity(?int $level, ?float $score): Similarity
    {
        return new Similarity($level, $score);
    }

    /**
     * @param string $pk
     * @return SimilarCar
     */
    public function createSimilarCar(string $pk): SimilarCar
    {
        return new SimilarCar($pk);
    }
}

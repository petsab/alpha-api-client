<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory\DataObject\Response;

use Teas\AlphaApiClient\DataObject\Response\TopSellingCar;
use Teas\AlphaApiClient\DataObject\Response\Url;

class DataObjectFactory
{
    /**
     * @param string|null $full
     * @return Url
     */
    public function createUrl(?string $full): Url
    {
        return new Url($full);
    }

    /**
     * @param int|null $count
     * @param string|null $make
     * @param string|null $model
     * @return TopSellingCar
     */
    public function createTopSellingCar(?int $count, ?string $make, ?string $model): TopSellingCar
    {
        return new TopSellingCar($count, $make, $model);
    }
}

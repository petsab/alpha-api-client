<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Request\Car;

use BootIq\ServiceLayer\Request\PostMethod;
use Teas\AlphaApiClient\DataObject\Request\SoldCarsFilter;

class PostTopSellingCarsRequest extends PostMethod
{
    public const DEFAULT_SIZE = 10;

    /**
     * @var SoldCarsFilter
     */
    private $filter;

    /**
     * @var int
     */
    private $size;

    /**
     * @param SoldCarsFilter $filter
     * @param int $size
     */
    public function __construct(SoldCarsFilter $filter, int $size = self::DEFAULT_SIZE)
    {
        $this->filter = $filter;
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return sprintf('sold_cars/top_selling?size=%d', $this->size);
    }

    /**
     * @return array<mixed>|null
     */
    public function getData()
    {
        return $this->filter->toArray();
    }
}

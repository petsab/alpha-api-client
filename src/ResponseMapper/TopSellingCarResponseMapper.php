<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\TopSellingCar;
use Teas\AlphaApiClient\Factory\DataObject\Response\DataObjectFactory;

class TopSellingCarResponseMapper
{
    /**
     * @var DataObjectFactory
     */
    protected $factory;

    /**
     * @param DataObjectFactory $factory
     */
    public function __construct(DataObjectFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param array<mixed> $data
     * @return TopSellingCar
     */
    public function map(array $data): TopSellingCar
    {
        return $this->factory->createTopSellingCar($data['count'], $data['make'], $data['model']);
    }
}

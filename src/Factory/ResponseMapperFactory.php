<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory;

use Teas\AlphaApiClient\Factory\DataObject\Response\AggregateStatisticDOFactory;
use Teas\AlphaApiClient\Factory\DataObject\Response\CarDOFactory;
use Teas\AlphaApiClient\Factory\DataObject\Response\DataObjectFactory;
use Teas\AlphaApiClient\ResponseMapper\AvailableCarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\CarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\StatisticsAggregatedResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\UrlResponseMapper;

class ResponseMapperFactory
{
    /**
     * @return UrlResponseMapper
     */
    public function createUrlResponseMapper(): UrlResponseMapper
    {
        return new UrlResponseMapper(new DataObjectFactory());
    }

    /**
     * @return AvailableCarResponseMapper
     */
    public function createAvailableCarResponseMapper(): AvailableCarResponseMapper
    {
        return new AvailableCarResponseMapper(
            new CarDOFactory(),
            $this->createUrlResponseMapper()
        );
    }

    /**
     * @return CarResponseMapper
     */
    public function createCarResponseMapper(): CarResponseMapper
    {
        return new CarResponseMapper(
            new CarDOFactory(),
            $this->createUrlResponseMapper()
        );
    }

    /**
     * @return StatisticsAggregatedResponseMapper
     */
    public function createStatisticsAggregatedResponseMapper(): StatisticsAggregatedResponseMapper
    {
        return new StatisticsAggregatedResponseMapper(
            new AggregateStatisticDOFactory()
        );
    }
}

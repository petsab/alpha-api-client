<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Request\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\ResponseMapper\AvailableCarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\CarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\SimilarCarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\StatisticsAggregatedResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\TopSellingCarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\UrlResponseMapper;

class ResponseMapperFactoryTest extends TestCase
{
    /**
     * @var ResponseMapperFactory
     */
    private $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = new ResponseMapperFactory();
    }

    public function testCreateUrlResponseMapper()
    {
        $mapper = $this->factory->createUrlResponseMapper();
        $this->assertInstanceOf(UrlResponseMapper::class, $mapper);
    }

    public function testCreateAvailableCarMapper()
    {
        $mapper = $this->factory->createAvailableCarResponseMapper();
        $this->assertInstanceOf(AvailableCarResponseMapper::class, $mapper);
    }

    public function testCreateCarMapper()
    {
        $mapper = $this->factory->createCarResponseMapper();
        $this->assertInstanceOf(CarResponseMapper::class, $mapper);
    }

    public function testStatisticsAggregateResponseMapper()
    {
        $mapper = $this->factory->createStatisticsAggregatedResponseMapper();
        $this->assertInstanceOf(StatisticsAggregatedResponseMapper::class, $mapper);
    }

    public function testCreateTopSellingCarsResponseMapper()
    {
        $mapper = $this->factory->createTopSellingCarResponseMapper();
        $this->assertInstanceOf(TopSellingCarResponseMapper::class, $mapper);
    }

    public function testCreateSimilarCarMapper()
    {
        $mapper = $this->factory->createSimilarCarResponseMapper();
        $this->assertInstanceOf(SimilarCarResponseMapper::class, $mapper);
    }
}

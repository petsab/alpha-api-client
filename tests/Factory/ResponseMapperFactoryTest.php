<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Request\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\ResponseMapper\AvailableCarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\CarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\StatisticsAggregatedResponseMapper;
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
        $urlMapper = $this->factory->createUrlResponseMapper();
        $this->assertInstanceOf(UrlResponseMapper::class, $urlMapper);
    }

    public function testCreateAvailableCarMapper()
    {
        $urlMapper = $this->factory->createAvailableCarResponseMapper();
        $this->assertInstanceOf(AvailableCarResponseMapper::class, $urlMapper);
    }

    public function testCreateCarMapper()
    {
        $urlMapper = $this->factory->createCarResponseMapper();
        $this->assertInstanceOf(CarResponseMapper::class, $urlMapper);
    }

    public function testStatisticsAggregateResponseMapper()
    {
        $urlMapper = $this->factory->createStatisticsAggregatedResponseMapper();
        $this->assertInstanceOf(StatisticsAggregatedResponseMapper::class, $urlMapper);
    }
}

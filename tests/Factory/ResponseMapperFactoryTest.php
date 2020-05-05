<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Request\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\ResponseMapper\AvailableCarResponseMapper;
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

    public function testCreateSourcingCarMapper()
    {
        $urlMapper = $this->factory->createAvailableCarResponseMapper();
        $this->assertInstanceOf(AvailableCarResponseMapper::class, $urlMapper);
    }
}

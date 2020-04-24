<?php

namespace TeasTest\AlphaApiClient\Request\Response;

use BootIq\ServiceLayer\Enum\HttpMethod;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\Factory\ResponseDataObjectFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Request\PostAvailableCarsRequest;
use Teas\AlphaApiClient\Request\SourcingCarRequestFactory;
use Teas\AlphaApiClient\ResponseMapper\SourcingCarResponseMapper;
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
        $urlMapper = $this->factory->createSourcingCarResponseMapper();
        $this->assertInstanceOf(SourcingCarResponseMapper::class, $urlMapper);
    }
}

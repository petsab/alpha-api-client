<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Request\Car;

use BootIq\ServiceLayer\Enum\HttpMethod;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\AvailableCarsFilter;
use Teas\AlphaApiClient\DataObject\Request\SimilarCarsFilter;
use Teas\AlphaApiClient\Factory\Request\SimilarCarRequestFactory;
use Teas\AlphaApiClient\Factory\Request\SourcingCarRequestFactory;
use Teas\AlphaApiClient\Request\Car\PostAvailableCarsRequest;
use Teas\AlphaApiClient\Request\Car\PostSimilarCarsRequest;

class PostSimilarCarsRequestTest extends TestCase
{
    /**
     * @var SimilarCarRequestFactory
     */
    private $factory;

    public function setUp(): void
    {
        parent::setUp();
        $this->factory = new SimilarCarRequestFactory();
    }

    public function testPostSimilarCarsRequest()
    {
        $window = rand(30, 200);
        $currency = uniqid();
        $filter = $this->createMock(SimilarCarsFilter::class);
        $filterData = [uniqid() => uniqid()];
        $filter->expects(self::once())
            ->method('toArray')
            ->willReturn($filterData);
        $request = $this->factory->createPostSimilarCarsRequest($filter, $window, $currency);
        $this->assertInstanceOf(PostSimilarCarsRequest::class, $request);
        $this->assertEquals(HttpMethod::METHOD_POST, $request->getMethod());
        $url = sprintf(
            'similar_cars?window=%d&currency=%s',
            $window,
            $currency
        );
        $this->assertSame($url, $request->getEndpoint());
        $this->assertSame($filterData, $request->getData());
    }

    public function testPostAvailableCarsRequestWithoutCurrency()
    {
        $window = rand(1, 1000);
        $filter = $this->createMock(SimilarCarsFilter::class);
        $request = $this->factory->createPostSimilarCarsRequest($filter, $window);
        $url = sprintf(
            'similar_cars?window=%d',
            $window
        );
        $this->assertSame($url, $request->getEndpoint());
    }
}

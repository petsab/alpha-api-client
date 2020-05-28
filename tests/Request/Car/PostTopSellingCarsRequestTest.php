<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Request\Car;

use BootIq\ServiceLayer\Enum\HttpMethod;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\SoldCarsFilter;
use Teas\AlphaApiClient\Factory\Request\SoldCarRequestFactory;
use Teas\AlphaApiClient\Factory\Request\SourcingCarRequestFactory;
use Teas\AlphaApiClient\Request\Car\PostTopSellingCarsRequest;

class PostTopSellingCarsRequestTest extends TestCase
{
    /**
     * @var SourcingCarRequestFactory
     */
    private $factory;

    public function setUp(): void
    {
        parent::setUp();
        $this->factory = new SoldCarRequestFactory();
    }

    public function testPostTopSellingCarsRequest()
    {
        $size = rand(50, 100);
        $filter = $this->createMock(SoldCarsFilter::class);
        $filterData = [uniqid() => uniqid()];
        $filter->expects(self::once())
            ->method('toArray')
            ->willReturn($filterData);
        $request = $this->factory->createPostTopSellingCarsRequest($filter, $size);
        $this->assertInstanceOf(PostTopSellingCarsRequest::class, $request);
        $this->assertEquals(HttpMethod::METHOD_POST, $request->getMethod());
        $url = sprintf(
            'sold_cars/top_selling?size=%d',
            $size
        );
        $this->assertSame($url, $request->getEndpoint());
        $this->assertSame($filterData, $request->getData());
    }
}

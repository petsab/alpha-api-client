<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Request\Car;

use BootIq\ServiceLayer\Enum\HttpMethod;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\AvailableCarsFilter;
use Teas\AlphaApiClient\Factory\Request\SourcingCarRequestFactory;
use Teas\AlphaApiClient\Request\Car\PostAvailableCarsRequest;

class PostAvailableCarsRequestTest extends TestCase
{
    /**
     * @var SourcingCarRequestFactory
     */
    private $factory;

    public function setUp(): void
    {
        parent::setUp();
        $this->factory = new SourcingCarRequestFactory();
    }

    public function testPostAvailableCarsRequest()
    {
        $offset = rand(1, 1000);
        $size = rand(50, 100);
        $orderBy = [];
        for ($i = 0; $i < rand(1, 5); $i++) {
            $orderBy[] = uniqid();
        }
        $currency = uniqid();
        $filter = $this->createMock(AvailableCarsFilter::class);
        $filterData = [uniqid() => uniqid()];
        $filter->expects(self::once())
            ->method('toArray')
            ->willReturn($filterData);
        $request = $this->factory->createPostAvailableCarsRequest($filter, $size, $offset, $orderBy, $currency);
        $this->assertInstanceOf(PostAvailableCarsRequest::class, $request);
        $this->assertEquals(HttpMethod::METHOD_POST, $request->getMethod());
        $url = sprintf(
            'available_cars?size=%d&offset=%d&order_by=%s&currency=%s',
            $size,
            $offset,
            implode(PostAvailableCarsRequest::QUERY_ARRAY_VALUES_GLUE, $orderBy),
            $currency
        );
        $this->assertSame($url, $request->getEndpoint());
        $this->assertSame($filterData, $request->getData());
    }

    public function testPostAvailableCarsRequestWithoutSortAndCurrency()
    {
        $offset = rand(1, 1000);
        $size = rand(50, 100);
        $filter = $this->createMock(AvailableCarsFilter::class);
        $request = $this->factory->createPostAvailableCarsRequest($filter, $size, $offset);
        $url = sprintf(
            'available_cars?size=%d&offset=%d',
            $size,
            $offset
        );
        $this->assertSame($url, $request->getEndpoint());
    }
}

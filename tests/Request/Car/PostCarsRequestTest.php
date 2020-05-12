<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Request\Car;

use BootIq\ServiceLayer\Enum\HttpMethod;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\Factory\Request\SourcingCarRequestFactory;
use Teas\AlphaApiClient\Request\Car\PostAvailableCarsRequest;
use Teas\AlphaApiClient\Request\Car\PostCarsRequest;

class PostCarsRequestTest extends TestCase
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

    public function testPostCarsRequest()
    {
        $offset = rand(1, 1000);
        $size = rand(50, 100);
        $orderBy = [];
        $ids = [];
        for ($i = 0; $i < rand(1, 5); $i++) {
            $orderBy[] = uniqid();
            $ids[] = uniqid();
        }

        $request = $this->factory->createPostCarsRequest($ids, $size, $offset, $orderBy);
        $this->assertInstanceOf(PostCarsRequest::class, $request);
        $this->assertEquals(HttpMethod::METHOD_POST, $request->getMethod());
        $url = sprintf(
            'cars?size=%d&offset=%d&order_by=%s',
            $size,
            $offset,
            implode(PostAvailableCarsRequest::QUERY_ARRAY_VALUES_GLUE, $orderBy)
        );
        $this->assertSame($url, $request->getEndpoint());
        $this->assertSame(['PK_list' => $ids], $request->getData());
    }

    public function testPostCarsRequestWithoutSort()
    {
        $offset = rand(1, 1000);
        $size = rand(50, 100);
        $ids = [];
        for ($i = 0; $i < rand(1, 5); $i++) {
            $ids[] = uniqid();
        }

        $request = $this->factory->createPostCarsRequest($ids, $size, $offset);
        $url = sprintf(
            'cars?size=%d&offset=%d',
            $size,
            $offset
        );
        $this->assertSame($url, $request->getEndpoint());
    }
}

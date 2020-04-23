<?php

namespace TeasTest\AlphaApiClient\Request\Response;

use BootIq\ServiceLayer\Enum\HttpMethod;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\Request\PostAvailableCarsRequest;
use Teas\AlphaApiClient\Request\SourcingCarRequestFactory;

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
        $b1 = [uniqid() => uniqid()];
        $b2 = [uniqid() => uniqid()];
        $body = [$b1, $b2];

        $request = $this->factory->createPostAvailableCarsRequest($body, $size, $offset, $orderBy);
        $this->assertInstanceOf(PostAvailableCarsRequest::class, $request);
        $this->assertEquals(HttpMethod::METHOD_POST, $request->getMethod());
        $url = sprintf(
            'available_cars?size=%d&offset=%d&order_by=%s',
            $size,
            $offset,
            implode(PostAvailableCarsRequest::QUERY_ARRAY_VALUES_GLUE, $orderBy)
        );
        $this->assertSame($url, $request->getEndpoint());
        $this->assertSame($body, $request->getData());
    }
}

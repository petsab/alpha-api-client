<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Request\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\Factory\SourcingCarRequestFactory;
use Teas\AlphaApiClient\Request\PostAvailableCarsRequest;

class SourcingCarRequestFactoryTest extends TestCase
{
    public function testCreatePostAvailableCarsRequest()
    {
        $factory = new SourcingCarRequestFactory();
        $request = $factory->createPostAvailableCarsRequest([]);
        $this->assertInstanceOf(PostAvailableCarsRequest::class, $request);
    }
}

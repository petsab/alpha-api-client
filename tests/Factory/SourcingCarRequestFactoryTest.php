<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Request\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\Factory\Request\SourcingCarRequestFactory;
use Teas\AlphaApiClient\Request\Car\PostAvailableCarsRequest;

class SourcingCarRequestFactoryTest extends TestCase
{
    public function testCreatePostAvailableCarsRequest()
    {
        $factory = new SourcingCarRequestFactory();
        $request = $factory->createPostAvailableCarsRequest([]);
        $this->assertInstanceOf(PostAvailableCarsRequest::class, $request);
    }
}

<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Factory\Request;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\AvailableCarsFilter;
use Teas\AlphaApiClient\Factory\Request\SourcingCarRequestFactory;
use Teas\AlphaApiClient\Request\Car\PostAvailableCarsRequest;

class SourcingCarRequestFactoryTest extends TestCase
{
    public function testCreatePostAvailableCarsRequest()
    {
        $factory = new SourcingCarRequestFactory();
        $filter = $this->createMock(AvailableCarsFilter::class);
        $request = $factory->createPostAvailableCarsRequest($filter);
        $this->assertInstanceOf(PostAvailableCarsRequest::class, $request);
    }
}

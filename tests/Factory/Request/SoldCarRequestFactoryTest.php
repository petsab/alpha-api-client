<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Factory\Request;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\SoldCarsFilter;
use Teas\AlphaApiClient\Factory\Request\SoldCarRequestFactory;
use Teas\AlphaApiClient\Request\Car\PostTopSellingCarsRequest;

class SoldCarRequestFactoryTest extends TestCase
{
    public function testCreatePostTopSellingCarsRequest()
    {
        $factory = new SoldCarRequestFactory();
        $filter = $this->createMock(SoldCarsFilter::class);
        $request = $factory->createPostTopSellingCarsRequest($filter);
        $this->assertInstanceOf(PostTopSellingCarsRequest::class, $request);
    }
}

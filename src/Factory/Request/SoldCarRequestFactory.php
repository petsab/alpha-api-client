<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory\Request;

use Teas\AlphaApiClient\DataObject\Request\SoldCarsFilter;
use Teas\AlphaApiClient\Request\Car\PostTopSellingCarsRequest;

class SoldCarRequestFactory
{
    /**
     * @param SoldCarsFilter $filter
     * @param int $size
     * @return PostTopSellingCarsRequest
     */
    public function createPostTopSellingCarsRequest(
        SoldCarsFilter $filter,
        int $size = PostTopSellingCarsRequest::DEFAULT_SIZE
    ): PostTopSellingCarsRequest {
        return new PostTopSellingCarsRequest($filter, $size);
    }
}

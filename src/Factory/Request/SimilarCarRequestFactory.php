<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory\Request;

use Teas\AlphaApiClient\DataObject\Request\SimilarCarsFilter;
use Teas\AlphaApiClient\Request\Car\PostSimilarCarsRequest;

class SimilarCarRequestFactory
{
    /**
     * @param SimilarCarsFilter $filter
     * @param int $window
     * @param string|null $currency
     * @return PostSimilarCarsRequest
     */
    public function createPostSimilarCarsRequest(
        SimilarCarsFilter $filter,
        int $window,
        ?string $currency = null
    ): PostSimilarCarsRequest {
        return new PostSimilarCarsRequest($filter, $window, $currency);
    }
}

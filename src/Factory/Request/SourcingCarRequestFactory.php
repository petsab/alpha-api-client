<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory\Request;

use Teas\AlphaApiClient\DataObject\Request\AvailableCarsFilter;
use Teas\AlphaApiClient\Request\Car\PostAvailableCarsRequest;
use Teas\AlphaApiClient\Request\Car\PostCarsRequest;

class SourcingCarRequestFactory
{
    /**
     * @param AvailableCarsFilter $filter
     * @param int $size
     * @param int $offset
     * @param array<string> $orderBy
     * @return PostAvailableCarsRequest
     */
    public function createPostAvailableCarsRequest(
        AvailableCarsFilter $filter,
        int $size = PostAvailableCarsRequest::DEFAULT_SIZE,
        int $offset = PostAvailableCarsRequest::DEFAULT_OFFSET,
        array $orderBy = []
    ): PostAvailableCarsRequest {
        return new PostAvailableCarsRequest($filter, $size, $offset, $orderBy);
    }

    /**
     * @param array<string> $ids
     * @param int|null $size
     * @param int|null $offset
     * @param array<string> $orderBy
     * @return PostCarsRequest
     */
    public function createPostCarsRequest(
        array $ids,
        ?int $size = null,
        ?int $offset = null,
        array $orderBy = []
    ): PostCarsRequest {
        return new PostCarsRequest($ids, $size, $offset, $orderBy);
    }
}

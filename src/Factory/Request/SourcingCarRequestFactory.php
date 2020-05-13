<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory\Request;

use Teas\AlphaApiClient\Request\Car\PostAvailableCarsRequest;
use Teas\AlphaApiClient\Request\Car\PostCarsRequest;

class SourcingCarRequestFactory
{
    /**
     * @param array<mixed> $body
     * @param int $offset
     * @param int $size
     * @param array<string> $orderBy
     * @return PostAvailableCarsRequest
     */
    public function createPostAvailableCarsRequest(
        array $body,
        int $size = PostAvailableCarsRequest::DEFAULT_SIZE,
        int $offset = PostAvailableCarsRequest::DEFAULT_OFFSET,
        array $orderBy = []
    ): PostAvailableCarsRequest {
        return new PostAvailableCarsRequest($body, $size, $offset, $orderBy);
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

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory;

use Teas\AlphaApiClient\Request\PostAvailableCarsRequest;

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
}

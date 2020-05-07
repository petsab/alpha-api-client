<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Request\Car;

use BootIq\ServiceLayer\Request\PostMethod;

class PostCarsRequest extends PostMethod
{
    /**
     * @var array<string>
     */
    private $ids = [];

    /**
     * @var int
     */
    private $offset;

    /**
     * @var int
     */
    private $size;

    /**
     * @var array<string>
     */
    private $orderBy = [];

    /**
     * @param array<mixed> $ids
     * @param int $size
     * @param int $offset
     * @param array<string> $orderBy
     */
    public function __construct(
        array $ids,
        int $size = PostAvailableCarsRequest::DEFAULT_SIZE,
        int $offset = PostAvailableCarsRequest::DEFAULT_OFFSET,
        array $orderBy = []
    ) {
        $this->offset = $offset;
        $this->size = $size;
        $this->orderBy = $orderBy;
        $this->ids = $ids;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        $queryParams = [];
        $queryParams[] = 'size=' . $this->size;
        $queryParams[] = 'offset=' . $this->offset;

        if (!empty($this->orderBy)) {
            $queryParams[] = 'order_by=' . implode(PostAvailableCarsRequest::QUERY_ARRAY_VALUES_GLUE, $this->orderBy);
        }

        return sprintf(
            'cars?%s',
            implode('&', $queryParams)
        );
    }

    /**
     * @return array<mixed>|null
     */
    public function getData()
    {
        return ['PK_list' => $this->ids];
    }
}

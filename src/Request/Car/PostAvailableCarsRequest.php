<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Request\Car;

use BootIq\ServiceLayer\Request\PostMethod;
use Teas\AlphaApiClient\DataObject\Request\AvailableCarsFilter;

class PostAvailableCarsRequest extends PostMethod
{
    public const DEFAULT_OFFSET = 0;
    public const DEFAULT_SIZE = 100;
    public const QUERY_ARRAY_VALUES_GLUE = ',';

    /**
     * @var AvailableCarsFilter
     */
    private $filter;

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
     * @param AvailableCarsFilter $filter
     * @param int $size
     * @param int $offset
     * @param array<string> $orderBy
     */
    public function __construct(
        AvailableCarsFilter $filter,
        int $size = self::DEFAULT_SIZE,
        int $offset = self::DEFAULT_OFFSET,
        array $orderBy = []
    ) {
        $this->offset = $offset;
        $this->size = $size;
        $this->orderBy = $orderBy;
        $this->filter = $filter;
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
            $queryParams[] = 'order_by=' . implode(self::QUERY_ARRAY_VALUES_GLUE, $this->orderBy);
        }

        return sprintf(
            'available_cars?%s',
            implode('&', $queryParams)
        );
    }

    /**
     * @return array<mixed>|null
     */
    public function getData()
    {
        return $this->filter->toArray();
    }
}

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class Rating implements DataObjectInterface
{
    /**
     * @var int|null
     */
    private $average;

    /**
     * @var int|null
     */
    private $count;

    /**
     * @param int|null $average
     * @param int|null $count
     */
    public function __construct(?int $average, ?int $count)
    {
        $this->average = $average;
        $this->count = $count;
    }

    /**
     * @return int|null
     */
    public function getAverage(): ?int
    {
        return $this->average;
    }

    /**
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'average' => $this->average,
            'count' => $this->count,
        ];
    }
}

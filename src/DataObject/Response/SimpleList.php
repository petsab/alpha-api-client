<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class SimpleList implements DataObjectInterface
{
    /**
     * @var array<object>
     */
    private $data = [];

    /**
     * @param array<object> $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array<mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        return [
            'data' => array_map(function (DataObjectInterface $item) {
                return $item->toArray();
            }, $this->data),
        ];
    }
}

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

class CarList extends SimpleList
{
    /**
     * @var array<string>
     */
    private $notFoundIds = [];

    /**
     * @param array<mixed> $data
     * @param array<string> $notFoundIds
     */
    public function __construct(array $data, array $notFoundIds)
    {
        parent::__construct($data);
        $this->notFoundIds = $notFoundIds;
    }

    /**
     * @return array<string>
     */
    public function getNotFoundIds(): array
    {
        return $this->notFoundIds;
    }

    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        $data = parent::toArray();
        $data['notFoundIds'] = $this->notFoundIds;

        return $data;
    }
}

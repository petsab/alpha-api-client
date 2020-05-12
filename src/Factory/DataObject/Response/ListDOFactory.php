<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory\DataObject\Response;

use Teas\AlphaApiClient\DataObject\Response\CarList;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;

class ListDOFactory
{
    /**
     * @param array<object> $data
     * @return SimpleList
     */
    public function createSimpleList(array $data): SimpleList
    {
        return new SimpleList($data);
    }

    /**
     * @param array<object> $data
     * @param array<string> $notFoundIds
     * @return CarList
     */
    public function createCarList(array $data, array $notFoundIds): CarList
    {
        return new CarList($data, $notFoundIds);
    }
}

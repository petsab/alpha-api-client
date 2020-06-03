<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;
use Teas\AlphaApiClient\DataObject\Response\CarList;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;

class ListDOFactory
{
    /**
     * @param array<DataObjectInterface> $data
     * @return SimpleList
     */
    public function createSimpleList(array $data): SimpleList
    {
        return new SimpleList($data);
    }

    /**
     * @param array<DataObjectInterface> $data
     * @param array<string> $notFoundIds
     * @return CarList
     */
    public function createCarList(array $data, array $notFoundIds): CarList
    {
        return new CarList($data, $notFoundIds);
    }
}

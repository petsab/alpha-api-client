<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

interface ListInterface
{
    /**
     * @return array<DataObjectInterface>
     */
    public function getData(): array;
}

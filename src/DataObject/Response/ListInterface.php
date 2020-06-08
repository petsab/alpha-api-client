<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

interface ListInterface
{
    /**
     * @return array<DataObjectInterface|CarInterface>
     */
    public function getData(): array;
}

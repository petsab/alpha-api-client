<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

interface ListInterface
{
    /**
     * @return array<object>
     */
    public function getData(): array;
}

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

interface ListInterface
{
    /**
     * @return array<mixed>
     */
    public function getData(): array;
}

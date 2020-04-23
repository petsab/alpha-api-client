<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject;

interface DataObjectInterface
{
    /**
     * @return array<mixed>
     */
    public function toArray(): array;
}

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

interface CarListInterface
{
    /**
     * @return array<CarInterface>
     */
    public function getData(): array;
}

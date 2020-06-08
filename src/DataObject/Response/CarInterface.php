<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

interface CarInterface extends DataObjectInterface
{
    /**
     * @return string
     */
    public function getId(): string;
}

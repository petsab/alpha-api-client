<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory\DataObject\Response;

use Teas\AlphaApiClient\DataObject\Response\Url;

class DataObjectFactory
{
    /**
     * @param string $full
     * @return Url
     */
    public function createUrl(string $full): Url
    {
        return new Url($full);
    }
}

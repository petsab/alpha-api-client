<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\Url;

class UrlResponseMapper extends AbstractResponseMapper
{
    /**
     * @param array<string> $data
     * @return Url
     */
    public function map(array $data): Url
    {
        return $this->factory->createUrl($data['full']);
    }
}

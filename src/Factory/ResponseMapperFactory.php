<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory;

use Teas\AlphaApiClient\ResponseMapper\SourcingCarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\UrlResponseMapper;

class ResponseMapperFactory
{
    /**
     * @return UrlResponseMapper
     */
    public function createUrlResponseMapper(): UrlResponseMapper
    {
        return new UrlResponseMapper(new ResponseDataObjectFactory());
    }

    /**
     * @return SourcingCarResponseMapper
     */
    public function createSourcingCarResponseMapper(): SourcingCarResponseMapper
    {
        return new SourcingCarResponseMapper(
            new ResponseDataObjectFactory(),
            $this->createUrlResponseMapper()
        );
    }
}

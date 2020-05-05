<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Factory;

use Teas\AlphaApiClient\ResponseMapper\AvailableCarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\CarResponseMapper;
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
     * @return AvailableCarResponseMapper
     */
    public function createAvailableCarResponseMapper(): AvailableCarResponseMapper
    {
        return new AvailableCarResponseMapper(
            new ResponseDataObjectFactory(),
            $this->createUrlResponseMapper()
        );
    }

    /**
     * @return CarResponseMapper
     */
    public function createCarResponseMapper(): CarResponseMapper
    {
        return new CarResponseMapper(
            new ResponseDataObjectFactory(),
            $this->createUrlResponseMapper()
        );
    }
}

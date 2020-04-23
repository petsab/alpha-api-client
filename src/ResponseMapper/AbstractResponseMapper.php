<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\Factory\ResponseDataObjectFactory;

abstract class AbstractResponseMapper
{
    /**
     * @var ResponseDataObjectFactory
     */
    protected $factory;

    /**
     * SellerResponseMapper constructor.
     * @param ResponseDataObjectFactory $factory
     */
    public function __construct(ResponseDataObjectFactory $factory)
    {
        $this->factory = $factory;
    }
}

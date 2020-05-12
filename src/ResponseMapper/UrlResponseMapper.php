<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\Url;
use Teas\AlphaApiClient\Factory\DataObject\Response\DataObjectFactory;

class UrlResponseMapper
{
    /**
     * @var DataObjectFactory
     */
    protected $factory;

    /**
     * @param DataObjectFactory $factory
     */
    public function __construct(DataObjectFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param array<string> $data
     * @return Url
     */
    public function map(array $data): Url
    {
        return $this->factory->createUrl($data['full']);
    }
}

<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Factory\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Url;
use Teas\AlphaApiClient\Factory\DataObject\Response\DataObjectFactory;

class DataObjectFactoryTest extends TestCase
{
    public function testCreateUrl()
    {
        $factory = new DataObjectFactory();
        $url = $factory->createUrl('full');
        $this->assertInstanceOf(Url::class, $url);
    }
}

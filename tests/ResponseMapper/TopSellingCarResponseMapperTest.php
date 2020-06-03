<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\ResponseMapper;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\Factory\DataObject\Response\DataObjectFactory;
use Teas\AlphaApiClient\ResponseMapper\TopSellingCarResponseMapper;
use Teas\AlphaApiClient\Traits\NullableDateTimeTrait;

class TopSellingCarResponseMapperTest extends TestCase
{
    use NullableDateTimeTrait;

    /**
     * @var DataObjectFactory
     */
    private $doFactory;


    public function setUp(): void
    {
        parent::setUp();
        $this->doFactory = new DataObjectFactory();
    }

    /**
     * @dataProvider getCreateTopSellingCarFromResponseInput
     * @param string $input
     * @throws \Exception
     */
    public function testCreateTopSellingCarFromResponse(string $input)
    {
        $response = json_decode($input, true);
        $mapper = new TopSellingCarResponseMapper($this->doFactory);
        $car = $mapper->map($response);
        $this->assertSame($response['count'], $car->getCount());
        $this->assertSame($response['make'], $car->getMake());
        $this->assertSame($response['model'], $car->getModel());
    }

    /**
     * @return array
     */
    public function getCreateTopSellingCarFromResponseInput()
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . "input" . DIRECTORY_SEPARATOR . "testCreateTopSellingCarFromResponse.php";

        return include $path;
    }
}

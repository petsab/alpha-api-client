<?php

namespace TeasTest\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use BootIq\ServiceLayer\Enum\HttpCode;
use BootIq\ServiceLayer\Response\ResponseInterface;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\SoldCarsFilter;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\DataObject\Response\TopSellingCar;
use Teas\AlphaApiClient\Enum\ResponseDataKey;
use Teas\AlphaApiClient\Factory\DataObject\Response\ListDOFactory;
use Teas\AlphaApiClient\Factory\Request\SoldCarRequestFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Request\Car\PostTopSellingCarsRequest;
use Teas\AlphaApiClient\ResponseMapper\TopSellingCarResponseMapper;
use Teas\AlphaApiClient\Service\SoldCarService;
use Teas\AlphaApiClient\Service\TokenProviderInterface;

class SoldCarServiceTest extends TestCase
{
    /**
     * @var AdapterInterface
     */
    private $adapter;

    /**
     * @var TokenProviderInterface
     */
    private $tokenProvider;

    /**
     * @var ResponseMapperFactory
     */
    private $responseMapperFactory;

    /**
     * @var SoldCarService
     */
    private $instance;

    /**
     * @var ListDOFactory
     */
    private $listDOFactory;

    /**
     * @var SoldCarRequestFactory
     */
    private $carRequestFactory;

    /**
     * @inheritdoc
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->adapter = $this->createMock(AdapterInterface::class);
        $this->responseMapperFactory = $this->createMock(ResponseMapperFactory::class);
        $this->listDOFactory = $this->createMock(ListDOFactory::class);
        $this->tokenProvider = $this->createMock(TokenProviderInterface::class);
        $this->carRequestFactory = $this->createMock(SoldCarRequestFactory::class);
        $this->instance = new SoldCarService(
            $this->adapter,
            $this->tokenProvider,
            $this->carRequestFactory,
            $this->responseMapperFactory,
            $this->listDOFactory
        );
    }

    public function testGetTopSellingCars()
    {
        $request = $this->createMock(PostTopSellingCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $mapper = $this->createMock(TopSellingCarResponseMapper::class);
        $topSellingCar = $this->createMock(TopSellingCar::class);
        $filter = $this->createMock(SoldCarsFilter::class);
        $size = rand(1, 20);

        $this->carRequestFactory->expects(self::once())
            ->method('createPostTopSellingCarsRequest')
            ->with($filter, $size)
            ->willReturn($request);
        $this->adapter->expects(self::once())
            ->method('call')
            ->with($request)
            ->willReturn($response);
        $this->tokenProvider->expects(self::once())
            ->method('getToken')
            ->willReturn(uniqid());
        $response->expects(self::exactly(3))
            ->method('isError')
            ->willReturn(false);
        $responseData = [ResponseDataKey::RESULT => [[uniqid()]]];
        $response->expects(self::once())
            ->method('getResponseData')
            ->willReturn(\GuzzleHttp\json_encode($responseData));
        $this->listDOFactory->expects(self::once())
            ->method('createSimpleList')
            ->with([$topSellingCar])
            ->willReturn(new SimpleList([$topSellingCar]));
        $this->responseMapperFactory->expects(self::once())
            ->method('createTopSellingCarResponseMapper')
            ->willReturn($mapper);
        $mapper->expects(self::once())
            ->method('map')
            ->willReturn($topSellingCar);
        $expected = new SimpleList([$topSellingCar]);
        $result = $this->instance->getTopSellingCarsList($filter, $size);
        $this->assertEquals($expected, $result);
    }

    public function testGetTopSellingCarsNotFoundAnyCar()
    {
        $request = $this->createMock(PostTopSellingCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $filter = $this->createMock(SoldCarsFilter::class);
        $size = rand(1, 20);

        $this->carRequestFactory->expects(self::once())
            ->method('createPostTopSellingCarsRequest')
            ->with($filter, $size)
            ->willReturn($request);
        $this->adapter->expects(self::once())
            ->method('call')
            ->with($request)
            ->willReturn($response);
        $this->tokenProvider->expects(self::once())
            ->method('getToken')
            ->willReturn(uniqid());
        $response->expects(self::exactly(2))
            ->method('isError')
            ->willReturn(true);
        $response->expects(self::exactly(2))
            ->method('getHttpCode')
            ->willReturn(HttpCode::HTTP_CODE_NOT_FOUND);
        $this->listDOFactory->expects(self::once())
            ->method('createSimpleList')
            ->with([])
            ->willReturn(new SimpleList([]));
        $expected = new SimpleList([]);
        $result = $this->instance->getTopSellingCarsList($filter, $size);
        $this->assertEquals($expected, $result);
    }
}

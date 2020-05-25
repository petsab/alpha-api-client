<?php

namespace TeasTest\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use BootIq\ServiceLayer\Enum\HttpCode;
use BootIq\ServiceLayer\Response\ResponseInterface;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\AvailableCarsFilter;
use Teas\AlphaApiClient\DataObject\Response\AvailableCar;
use Teas\AlphaApiClient\DataObject\Response\Car;
use Teas\AlphaApiClient\DataObject\Response\CarList;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\Enum\ResponseDataKey;
use Teas\AlphaApiClient\Exception\CarNotFoundException;
use Teas\AlphaApiClient\Exception\ErrorResponseException;
use Teas\AlphaApiClient\Factory\DataObject\Response\ListDOFactory;
use Teas\AlphaApiClient\Factory\Request\SourcingCarRequestFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Request\Car\PostAvailableCarsRequest;
use Teas\AlphaApiClient\Request\Car\PostCarsRequest;
use Teas\AlphaApiClient\ResponseMapper\AvailableCarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\CarResponseMapper;
use Teas\AlphaApiClient\Service\SourcingCarService;
use Teas\AlphaApiClient\Service\TokenProviderInterface;

class SourcingCarServiceTest extends TestCase
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
     * @var SourcingCarService
     */
    private $instance;

    /**
     * @var ListDOFactory
     */
    private $listDOFactory;

    /**
     * @var SourcingCarRequestFactory
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
        $this->carRequestFactory = $this->createMock(SourcingCarRequestFactory::class);
        $this->instance = new SourcingCarService(
            $this->adapter,
            $this->tokenProvider,
            $this->carRequestFactory,
            $this->responseMapperFactory,
            $this->listDOFactory
        );
    }

    public function testGetAvailableCars()
    {
        $request = $this->createMock(PostAvailableCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $mapper = $this->createMock(AvailableCarResponseMapper::class);
        $availableCar = $this->createMock(AvailableCar::class);
        $filter = $this->createMock(AvailableCarsFilter::class);
        $size = rand(1, 20);
        $offset = rand(100, 200);

        $this->carRequestFactory->expects(self::once())
            ->method('createPostAvailableCarsRequest')
            ->with($filter, $size, $offset)
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
            ->willReturn(false);
        $responseData = [ResponseDataKey::RESULT => [[uniqid()]]];
        $response->expects(self::once())
            ->method('getResponseData')
            ->willReturn(\GuzzleHttp\json_encode($responseData));
        $this->listDOFactory->expects(self::once())
            ->method('createSimpleList')
            ->with([$availableCar])
            ->willReturn(new SimpleList([$availableCar]));
        $this->responseMapperFactory->expects(self::once())
            ->method('createAvailableCarResponseMapper')
            ->willReturn($mapper);
        $mapper->expects(self::once())
            ->method('map')
            ->willReturn($availableCar);
        $expected = new SimpleList([$availableCar]);
        $result = $this->instance->getAvailableCarsList($filter, $size, $offset);
        $this->assertEquals($expected, $result);
    }

    public function testGetAvailableWithExpiredTokenCars()
    {
        $request = $this->createMock(PostAvailableCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $mapper = $this->createMock(AvailableCarResponseMapper::class);
        $availableCar = $this->createMock(AvailableCar::class);
        $filter = $this->createMock(AvailableCarsFilter::class);
        $size = rand(1, 20);
        $offset = rand(100, 200);

        $this->carRequestFactory->expects(self::once())
            ->method('createPostAvailableCarsRequest')
            ->with($filter, $size, $offset)
            ->willReturn($request);
        $this->adapter->expects(self::exactly(2))
            ->method('call')
            ->with($request)
            ->willReturn($response);
        $this->tokenProvider->expects(self::once())
            ->method('getToken')
            ->willReturn(uniqid());
        $response->expects(self::at(0))
            ->method('isError')
            ->willReturn(true);
        $response->expects(self::at(1))
            ->method('isError')
            ->willReturn(false);
        $response->expects(self::exactly(1))
            ->method('getHttpCode')
            ->willReturn(HttpCode::HTTP_CODE_UNAUTHORIZED);
        $this->tokenProvider->expects(self::once())
            ->method('renewToken')
            ->willReturn(uniqid());
        $responseData = [ResponseDataKey::RESULT => [[uniqid()]]];
        $response->expects(self::once())
            ->method('getResponseData')
            ->willReturn(\GuzzleHttp\json_encode($responseData));
        $this->listDOFactory->expects(self::once())
            ->method('createSimpleList')
            ->with([$availableCar])
            ->willReturn(new SimpleList([$availableCar]));
        $this->responseMapperFactory->expects(self::once())
            ->method('createAvailableCarResponseMapper')
            ->willReturn($mapper);
        $mapper->expects(self::once())
            ->method('map')
            ->willReturn($availableCar);
        $expected = new SimpleList([$availableCar]);
        $result = $this->instance->getAvailableCarsList($filter, $size, $offset);
        $this->assertEquals($expected, $result);
    }

    public function testGetAvailableCarsWithError()
    {
        $request = $this->createMock(PostAvailableCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $filter = $this->createMock(AvailableCarsFilter::class);
        $size = rand(1, 20);
        $offset = rand(100, 200);

        $this->carRequestFactory->expects(self::once())
            ->method('createPostAvailableCarsRequest')
            ->with($filter, $size, $offset)
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
            ->willReturn(HttpCode::HTTP_CODE_INTERNAL_SERVER_ERROR);
        $response->method('getResponseData')
            ->willReturn(\GuzzleHttp\json_encode([]));
        $this->expectException(ErrorResponseException::class);
        $result = $this->instance->getAvailableCarsList($filter, $size, $offset);
    }

    public function testGetCar()
    {
        $request = $this->createMock(PostCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $mapper = $this->createMock(CarResponseMapper::class);
        $car = $this->createMock(Car::class);
        $id = uniqid();

        $this->carRequestFactory->expects(self::once())
            ->method('createPostCarsRequest')
            ->with([$id])
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
        $this->responseMapperFactory->expects(self::once())
            ->method('createCarResponseMapper')
            ->willReturn($mapper);
        $mapper->expects(self::once())
            ->method('map')
            ->willReturn($car);

        $result = $this->instance->getCar($id);
        $this->assertEquals($car, $result);
    }

    public function testGetNonExistsCar()
    {
        $request = $this->createMock(PostCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $id = uniqid();

        $this->carRequestFactory->expects(self::once())
            ->method('createPostCarsRequest')
            ->with([$id])
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
        $response->expects(self::exactly(3))
            ->method('getHttpCode')
            ->willReturn(HttpCode::HTTP_CODE_NOT_FOUND);
        $this->expectException(CarNotFoundException::class);
        $this->instance->getCar($id);
    }

    public function testGetCarWithError()
    {
        $request = $this->createMock(PostCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $id = uniqid();

        $this->carRequestFactory->expects(self::once())
            ->method('createPostCarsRequest')
            ->with([$id])
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
            ->willReturn(true);
        $response->expects(self::exactly(3))
            ->method('getHttpCode')
            ->willReturn(HttpCode::HTTP_CODE_INTERNAL_SERVER_ERROR);
        $this->expectException(ErrorResponseException::class);
        $this->instance->getCar($id);
    }

    public function testGetCarsByIds()
    {
        $request = $this->createMock(PostCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $mapper = $this->createMock(CarResponseMapper::class);
        $car1 = $this->createMock(Car::class);
        $car2 = $this->createMock(Car::class);
        $ids = [uniqid(), uniqid()];

        $this->carRequestFactory->expects(self::once())
            ->method('createPostCarsRequest')
            ->with($ids)
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
        $responseData = [
            ResponseDataKey::RESULT => [[uniqid()], [uniqid()]],
        ];
        $response->expects(self::once())
            ->method('getResponseData')
            ->willReturn(\GuzzleHttp\json_encode($responseData));
        $this->responseMapperFactory->expects(self::once())
            ->method('createCarResponseMapper')
            ->willReturn($mapper);
        $mapper->expects(self::at(0))
            ->method('map')
            ->willReturn($car1);
        $mapper->expects(self::at(1))
            ->method('map')
            ->willReturn($car2);
        $this->listDOFactory->expects(self::once())
            ->method('createCarList')
            ->with([$car1, $car2], [])
            ->willReturn(new CarList([$car1, $car2], []));
        $list = new CarList([$car1, $car2], []);
        $result = $this->instance->getCarsListByIds($ids);

        $this->assertEquals($list, $result);
    }

    public function testGetCarsByIdsWithWarningData()
    {
        $request = $this->createMock(PostCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $mapper = $this->createMock(CarResponseMapper::class);
        $car1 = $this->createMock(Car::class);
        $car2 = $this->createMock(Car::class);
        $ids = [uniqid(), uniqid(), uniqid(), uniqid()];

        $this->carRequestFactory->expects(self::once())
            ->method('createPostCarsRequest')
            ->with($ids)
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
        $notFoundIds = ['Auto-1', 'Auto-2'];
        $warningData = [[
            ResponseDataKey::ITEM_IDS => $notFoundIds,
            ResponseDataKey::WARNING_TYPE => SourcingCarService::WARNING_UNAVAILABLE_ITEMS,
        ]];
        $responseData = [
            ResponseDataKey::RESULT => [[uniqid()], [uniqid()]],
            ResponseDataKey::WARNINGS => $warningData,
        ];
        $response->expects(self::once())
            ->method('getResponseData')
            ->willReturn(\GuzzleHttp\json_encode($responseData));
        $this->responseMapperFactory->expects(self::once())
            ->method('createCarResponseMapper')
            ->willReturn($mapper);
        $mapper->expects(self::at(0))
            ->method('map')
            ->willReturn($car1);
        $mapper->expects(self::at(1))
            ->method('map')
            ->willReturn($car2);
        $this->listDOFactory->expects(self::once())
            ->method('createCarList')
            ->with([$car1, $car2], $notFoundIds)
            ->willReturn(new CarList([$car1, $car2], $notFoundIds));
        $list = new CarList([$car1, $car2], $notFoundIds);
        $result = $this->instance->getCarsListByIds($ids);

        $this->assertEquals($list, $result);
    }

    public function testGetCarsByIdsWithSize()
    {
        $request = $this->createMock(PostCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $mapper = $this->createMock(CarResponseMapper::class);
        $car1 = $this->createMock(Car::class);
        $car2 = $this->createMock(Car::class);
        $ids = [uniqid(), uniqid(), uniqid(), uniqid()];
        $size = rand(1, 3);

        $this->carRequestFactory->expects(self::once())
            ->method('createPostCarsRequest')
            ->with($ids, $size)
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
        $notFoundIds = [];
        $warningData = [[
            'message' => uniqid(),
            ResponseDataKey::WARNING_TYPE => uniqid(),
        ]];
        $responseData = [
            ResponseDataKey::RESULT => [[uniqid()], [uniqid()]],
            ResponseDataKey::WARNINGS => $warningData,
        ];
        $response->expects(self::once())
            ->method('getResponseData')
            ->willReturn(\GuzzleHttp\json_encode($responseData));
        $this->responseMapperFactory->expects(self::once())
            ->method('createCarResponseMapper')
            ->willReturn($mapper);
        $mapper->expects(self::at(0))
            ->method('map')
            ->willReturn($car1);
        $mapper->expects(self::at(1))
            ->method('map')
            ->willReturn($car2);
        $this->listDOFactory->expects(self::once())
            ->method('createCarList')
            ->with([$car1, $car2], $notFoundIds)
            ->willReturn(new CarList([$car1, $car2], $notFoundIds));
        $list = new CarList([$car1, $car2], $notFoundIds);
        $result = $this->instance->getCarsListByIds($ids, $size);

        $this->assertEquals($list, $result);
    }

    public function testGetCarsByIdsNotFoundAnyCar()
    {
        $request = $this->createMock(PostCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $ids = [uniqid(), uniqid(), uniqid(), uniqid()];
        $size = rand(1, 20);
        $offset = rand(100, 200);

        $this->carRequestFactory->expects(self::once())
            ->method('createPostCarsRequest')
            ->with($ids, $size, $offset)
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
            ->method('createCarList')
            ->with([], $ids)
            ->willReturn(new CarList([], $ids));
        $list = new CarList([], $ids);
        $result = $this->instance->getCarsListByIds($ids, $size, $offset);

        $this->assertEquals($list, $result);
    }

    public function testGetCarsByIdsWithError()
    {
        $request = $this->createMock(PostCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $ids = [uniqid(), uniqid(), uniqid(), uniqid()];
        $size = rand(1, 20);
        $offset = rand(100, 200);

        $this->carRequestFactory->expects(self::once())
            ->method('createPostCarsRequest')
            ->with($ids, $size, $offset)
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
            ->willReturn(true);
        $response->expects(self::exactly(3))
            ->method('getHttpCode')
            ->willReturn(HttpCode::HTTP_CODE_INTERNAL_SERVER_ERROR);
        $this->expectException(ErrorResponseException::class);
        $result = $this->instance->getCarsListByIds($ids, $size, $offset);
    }
}

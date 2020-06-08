<?php

namespace TeasTest\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use BootIq\ServiceLayer\Enum\HttpCode;
use BootIq\ServiceLayer\Response\ResponseInterface;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\SimilarCarsFilter;
use Teas\AlphaApiClient\DataObject\Request\SoldCarsFilter;
use Teas\AlphaApiClient\DataObject\Response\SimilarCar;
use Teas\AlphaApiClient\DataObject\Response\SimpleCarList;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\DataObject\Response\TopSellingCar;
use Teas\AlphaApiClient\Enum\ResponseDataKey;
use Teas\AlphaApiClient\Factory\DataObject\Response\ListDOFactory;
use Teas\AlphaApiClient\Factory\Request\SimilarCarRequestFactory;
use Teas\AlphaApiClient\Factory\Request\SoldCarRequestFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Request\Car\PostSimilarCarsRequest;
use Teas\AlphaApiClient\Request\Car\PostTopSellingCarsRequest;
use Teas\AlphaApiClient\ResponseMapper\SimilarCarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\TopSellingCarResponseMapper;
use Teas\AlphaApiClient\Service\SimilarCarService;
use Teas\AlphaApiClient\Service\SoldCarService;
use Teas\AlphaApiClient\Service\TokenProviderInterface;

class SimilarCarServiceTest extends TestCase
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
     * @var SimilarCarService
     */
    private $instance;

    /**
     * @var ListDOFactory
     */
    private $listDOFactory;

    /**
     * @var SimilarCarRequestFactory
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
        $this->carRequestFactory = $this->createMock(SimilarCarRequestFactory::class);
        $this->instance = new SimilarCarService(
            $this->adapter,
            $this->tokenProvider,
            $this->carRequestFactory,
            $this->responseMapperFactory,
            $this->listDOFactory
        );
    }

    public function testGetSimilarCars()
    {
        $request = $this->createMock(PostSimilarCarsRequest::class);
        $response = $this->createMock(ResponseInterface::class);
        $mapper = $this->createMock(SimilarCarResponseMapper::class);
        $similarCar = $this->createMock(SimilarCar::class);
        $filter = $this->createMock(SimilarCarsFilter::class);
        $window = rand(1, 20);
        $currency = uniqid();

        $this->carRequestFactory->expects(self::once())
            ->method('createPostSimilarCarsRequest')
            ->with($filter, $window, $currency)
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
            ->method('createSimpleCarList')
            ->with([$similarCar])
            ->willReturn(new SimpleCarList([$similarCar]));
        $this->responseMapperFactory->expects(self::once())
            ->method('createSimilarCarResponseMapper')
            ->willReturn($mapper);
        $mapper->expects(self::once())
            ->method('map')
            ->willReturn($similarCar);
        $expected = new SimpleCarList([$similarCar]);
        $result = $this->instance->getSimilarCarsList($filter, $window, $currency);
        $this->assertEquals($expected, $result);
    }
}

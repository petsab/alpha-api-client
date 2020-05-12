<?php

namespace TeasTest\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use BootIq\ServiceLayer\Enum\HttpCode;
use BootIq\ServiceLayer\Response\ResponseInterface;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\StatisticsAggregatedParams;
use Teas\AlphaApiClient\DataObject\Response\AggregatedStatistic;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\Exception\ErrorResponseException;
use Teas\AlphaApiClient\Factory\DataObject\Response\ListDOFactory;
use Teas\AlphaApiClient\Factory\Request\StatisticsRequestFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Request\Statistics\GetStatisticsAggregated;
use Teas\AlphaApiClient\ResponseMapper\StatisticsAggregatedResponseMapper;
use Teas\AlphaApiClient\Service\AggregatedStatisticsService;
use Teas\AlphaApiClient\Service\TokenProviderInterface;

class AggregatedStatisticsServiceTest extends TestCase
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
     * @var AggregatedStatisticsService
     */
    private $instance;

    /**
     * @var ListDOFactory
     */
    private $listDOFactory;

    /**
     * @var StatisticsRequestFactory
     */
    private $requestFactory;

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
        $this->requestFactory = $this->createMock(StatisticsRequestFactory::class);
        $this->instance = new AggregatedStatisticsService(
            $this->adapter,
            $this->tokenProvider,
            $this->requestFactory,
            $this->responseMapperFactory,
            $this->listDOFactory
        );
    }

    public function testGetAvailableCars()
    {
        $request = $this->createMock(GetStatisticsAggregated::class);
        $response = $this->createMock(ResponseInterface::class);
        $mapper = $this->createMock(StatisticsAggregatedResponseMapper::class);
        $statisticsDO = $this->createMock(AggregatedStatistic::class);
        $params = new StatisticsAggregatedParams();
        $levels = [uniqid()];
        $regions = [uniqid()];

        $this->requestFactory->expects(self::once())
            ->method('createGetStatisticsAggregatedRequest')
            ->with($levels, $regions, $params)
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
        $responseData = [AggregatedStatisticsService::KEY_RESULT => [[uniqid()]]];
        $response->expects(self::once())
            ->method('getResponseData')
            ->willReturn(\GuzzleHttp\json_encode($responseData));
        $this->listDOFactory->expects(self::once())
            ->method('createSimpleList')
            ->with([$statisticsDO])
            ->willReturn(new SimpleList([$statisticsDO]));
        $this->responseMapperFactory->expects(self::once())
            ->method('createStatisticsAggregatedResponseMapper')
            ->willReturn($mapper);
        $mapper->expects(self::once())
            ->method('map')
            ->willReturn($statisticsDO);
        $expected = new SimpleList([$statisticsDO]);
        $result = $this->instance->getAggregatedStatistics($levels, $regions, $params);
        $this->assertEquals($expected, $result);
    }


    public function testGetAvailableCarsWithError()
    {
        $request = $this->createMock(GetStatisticsAggregated::class);
        $response = $this->createMock(ResponseInterface::class);
        $mapper = $this->createMock(StatisticsAggregatedResponseMapper::class);
        $statisticsDO = $this->createMock(AggregatedStatistic::class);
        $params = new StatisticsAggregatedParams();
        $levels = [uniqid()];
        $regions = [uniqid()];

        $this->requestFactory->expects(self::once())
            ->method('createGetStatisticsAggregatedRequest')
            ->with($levels, $regions, $params)
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

        $this->expectException(ErrorResponseException::class);
        $result = $this->instance->getAggregatedStatistics($levels, $regions, $params);
    }
}

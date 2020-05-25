<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use Teas\AlphaApiClient\DataObject\Request\StatisticsAggregatedParams;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\Enum\ResponseDataKey;
use Teas\AlphaApiClient\Exception\ErrorResponseException;
use Teas\AlphaApiClient\Exception\InvalidArgumentException;
use Teas\AlphaApiClient\Factory\DataObject\Response\ListDOFactory;
use Teas\AlphaApiClient\Factory\Request\StatisticsRequestFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Traits\ErrorResponseTrait;

class AggregatedStatisticsService extends BaseAuthorizationService
{
    use ErrorResponseTrait;

    /**
     * @var StatisticsRequestFactory
     */
    private $requestFactory;

    /**
     * @var ResponseMapperFactory
     */
    private $responseMapperFactory;

    /**
     * @var ListDOFactory
     */
    private $listDOFactory;

    /**
     * @param AdapterInterface $adapter
     * @param TokenProviderInterface $tokenProvider
     * @param StatisticsRequestFactory $requestFactory
     * @param ResponseMapperFactory $responseMapperFactory
     * @param ListDOFactory $listResponseFactory
     */
    public function __construct(
        AdapterInterface $adapter,
        TokenProviderInterface $tokenProvider,
        StatisticsRequestFactory $requestFactory,
        ResponseMapperFactory $responseMapperFactory,
        ListDOFactory $listResponseFactory
    ) {
        parent::__construct($adapter, $tokenProvider);
        $this->requestFactory = $requestFactory;
        $this->responseMapperFactory = $responseMapperFactory;
        $this->listDOFactory = $listResponseFactory;
    }

    /**
     * @param array<string> $levels
     * @param array<string> $regions
     * @param StatisticsAggregatedParams $params
     * @throws InvalidArgumentException
     * @throws ErrorResponseException
     * @return SimpleList
     */
    public function getAggregatedStatistics(
        array $levels,
        array $regions,
        StatisticsAggregatedParams $params
    ): SimpleList {
        $request = $this->requestFactory->createGetStatisticsAggregatedRequest($levels, $regions, $params);
        $response = $this->callRequest($request);
        $this->processCommonError($response);
        $responseData = json_decode($response->getResponseData(), true);
        $mapper = $this->responseMapperFactory->createStatisticsAggregatedResponseMapper();
        $result = [];

        foreach ($responseData[ResponseDataKey::RESULT] as $data) {
            $result[] = $mapper->map($data);
        }

        return $this->listDOFactory->createSimpleList($result);
    }
}

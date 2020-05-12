<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use Teas\AlphaApiClient\DataObject\Request\StatisticsAggregatedParams;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\Exception\ErrorResponseException;
use Teas\AlphaApiClient\Exception\InvalidArgumentException;
use Teas\AlphaApiClient\Factory\DataObject\Response\ListDOFactory;
use Teas\AlphaApiClient\Factory\Request\StatisticsRequestFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;

class StatisticsAggregatedService extends BaseAuthorizationService
{
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
    private $listResponseFactory;

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
        $this->listResponseFactory = $listResponseFactory;
    }

    /**
     * @param array<string> $levels
     * @param array<string> $regions
     * @param StatisticsAggregatedParams $params
     * @throws ErrorResponseException
     * @throws InvalidArgumentException
     * @return SimpleList
     */
    public function getAggregatedStatistics(
        array $levels,
        array $regions,
        StatisticsAggregatedParams $params
    ): SimpleList {
        $request = $this->requestFactory->createGetStatisticsAggregatedRequest($levels, $regions, $params);
        $response = $this->callRequest($request);
        if ($response->isError()) {
            throw new ErrorResponseException($response->getResponseData(), $response->getHttpCode());
        }

        $responseData = json_decode($response->getResponseData(), true);
        $mapper = $this->responseMapperFactory->createStatisticsAggregatedResponseMapper();

        $result = [];
        foreach ($responseData['result'] as $data) {
            $result[] = $mapper->map($data);
        }

        return $this->listResponseFactory->createSimpleList($result);
    }
}

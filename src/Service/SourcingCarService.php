<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use BootIq\ServiceLayer\Enum\HttpCode;
use BootIq\ServiceLayer\Request\RequestInterface;
use BootIq\ServiceLayer\Response\ResponseInterface;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\DataObject\Response\SourcingCar;
use Teas\AlphaApiClient\Enum\HttpHeader;
use Teas\AlphaApiClient\Exception\ErrorResponseException;
use Teas\AlphaApiClient\Factory\ResponseDataObjectFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Factory\SourcingCarRequestFactory;
use Teas\AlphaApiClient\Request\PostAvailableCarsRequest;

use function json_decode;

class SourcingCarService
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
     * @var SourcingCarRequestFactory
     */
    private $carRequestFactory;

    /**
     * @var ResponseMapperFactory
     */
    private $responseMapperFactory;

    /**
     * @var ResponseDataObjectFactory
     */
    private $responseDataObjectFactory;

    /**
     * @param AdapterInterface $adapter
     * @param SourcingCarRequestFactory $carRequestFactory
     * @param ResponseMapperFactory $responseMapperFactory
     * @param ResponseDataObjectFactory $responseDataObjectFactory
     * @param TokenProviderInterface $tokenProvider
     */
    public function __construct(
        AdapterInterface $adapter,
        TokenProviderInterface $tokenProvider,
        SourcingCarRequestFactory $carRequestFactory,
        ResponseMapperFactory $responseMapperFactory,
        ResponseDataObjectFactory $responseDataObjectFactory
    ) {
        $this->adapter = $adapter;
        $this->tokenProvider = $tokenProvider;
        $this->carRequestFactory = $carRequestFactory;
        $this->responseMapperFactory = $responseMapperFactory;
        $this->responseDataObjectFactory = $responseDataObjectFactory;
    }

    /**
     * @param array<mixed> $searchParams
     * @param int $size
     * @param int $offset
     * @param array<string> $orderBy
     * @throws ErrorResponseException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Teas\AlphaApiClient\Exception\AwsAuthenticationException
     * @return SimpleList
     */
    public function getAvailableCars(
        array $searchParams,
        int $size = PostAvailableCarsRequest::DEFAULT_SIZE,
        int $offset = PostAvailableCarsRequest::DEFAULT_OFFSET,
        array $orderBy = []
    ): SimpleList {
        $request = $this->carRequestFactory->createPostAvailableCarsRequest($searchParams, $size, $offset, $orderBy);
        $response = $this->callRequest($request);

        if ($response->isError()) {
            throw new ErrorResponseException($response->getResponseData(), $response->getHttpCode());
        }

        $responseData = json_decode($response->getResponseData(), true);
        $mapper = $this->responseMapperFactory->createSourcingCarResponseMapper();
        $result = [];

        foreach ($responseData['result'] as $data) {
            $result[] = $mapper->map($data);
        }

        return $this->responseDataObjectFactory->createSimpleList($result);
    }

    /**
     * @param string $id
     * @return SourcingCar
     */
    public function getCar(string $id): SourcingCar
    {
        $data = json_decode($this->getMockData(), true);
        $mapper = $this->responseMapperFactory->createSourcingCarResponseMapper();
        $car = $mapper->map($data);
        $car->setId($id);

        return $car;
    }

    /**
     * @return string
     */
    private function getMockData(): string
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR
            . 'MockData' . DIRECTORY_SEPARATOR . 'singleAlphaResponse.php';

        return include $path;
    }

    /**
     * @param RequestInterface $request
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Teas\AlphaApiClient\Exception\AwsAuthenticationException
     * @return \BootIq\ServiceLayer\Response\ResponseInterface
     */
    private function callRequest(RequestInterface $request): ResponseInterface
    {
        $request->addHeader(HttpHeader::AUTHORIZATION, $this->tokenProvider->getToken());
        $response = $this->adapter->call($request);

        if ($response->isError() && HttpCode::HTTP_CODE_UNAUTHORIZED === $response->getHttpCode()) {
            $request->setHeaders([HttpHeader::AUTHORIZATION => $this->tokenProvider->renewToken()]);
            $response = $this->adapter->call($request);
        }

        return $response;
    }
}

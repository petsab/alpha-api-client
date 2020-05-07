<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use BootIq\ServiceLayer\Enum\HttpCode;
use Teas\AlphaApiClient\DataObject\Response\Car;
use Teas\AlphaApiClient\DataObject\Response\CarList;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\Exception\AwsAuthenticationException;
use Teas\AlphaApiClient\Exception\CarNotFoundException;
use Teas\AlphaApiClient\Exception\ErrorResponseException;
use Teas\AlphaApiClient\Factory\ResponseDataObjectFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Factory\Request\SourcingCarRequestFactory;
use Teas\AlphaApiClient\Request\Car\PostAvailableCarsRequest;

use function json_decode;

class SourcingCarService extends BaseAuthorizationService
{
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
        parent::__construct($adapter, $tokenProvider);
        $this->carRequestFactory = $carRequestFactory;
        $this->responseMapperFactory = $responseMapperFactory;
        $this->responseDataObjectFactory = $responseDataObjectFactory;
    }

    /**
     * @param array<mixed> $searchParams
     * @param int $size
     * @param int $offset
     * @param array<string> $orderBy
     * @return SimpleList
     * @throws ErrorResponseException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws AwsAuthenticationException
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
        $mapper = $this->responseMapperFactory->createAvailableCarResponseMapper();
        $result = [];

        foreach ($responseData['result'] as $data) {
            $result[] = $mapper->map($data);
        }

        return $this->responseDataObjectFactory->createSimpleList($result);
    }

    /**
     * @param string $id
     * @return Car
     * @throws AwsAuthenticationException
     * @throws CarNotFoundException
     * @throws ErrorResponseException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getCar(string $id): Car
    {
        $request = $this->carRequestFactory->createPostCarsRequest([$id], 1, 0);
        $response = $this->callRequest($request);

        if ($response->isError() && HttpCode::HTTP_CODE_NOT_FOUND === $response->getHttpCode()) {
            throw new CarNotFoundException(sprintf('Id: %s', $id), $response->getHttpCode());
        }

        if ($response->isError()) {
            throw new ErrorResponseException($response->getResponseData(), $response->getHttpCode());
        }

        $responseData = json_decode($response->getResponseData(), true);
        $mapper = $this->responseMapperFactory->createCarResponseMapper();
        $data = reset($responseData['result']);

        return $mapper->map($data);
    }

    /**
     * @param array<string> $ids
     * @param int $size
     * @param int $offset
     * @param array<string> $orderBy
     * @return CarList
     * @throws CarNotFoundException
     * @throws ErrorResponseException
     */
    public function getCarsByIds(
        array $ids,
        int $size = PostAvailableCarsRequest::DEFAULT_SIZE,
        int $offset = PostAvailableCarsRequest::DEFAULT_OFFSET,
        array $orderBy = []
    ): CarList {
        $request = $this->carRequestFactory->createPostCarsRequest($ids, $size, $offset, $orderBy);
        $response = $this->callRequest($request);

        if ($response->isError() && HttpCode::HTTP_CODE_NOT_FOUND === $response->getHttpCode()) {
            throw new CarNotFoundException('No vehicle found.', $response->getHttpCode());
        }

        if ($response->isError()) {
            throw new ErrorResponseException($response->getResponseData(), $response->getHttpCode());
        }

        $responseData = json_decode($response->getResponseData(), true);
        $notFoundIds = reset($responseData['warning']) ?: [];
        $mapper = $this->responseMapperFactory->createCarResponseMapper();
        $result = [];

        foreach ($responseData['result'] as $data) {
            $result[] = $mapper->map($data);
        }

        return $this->responseDataObjectFactory->createCarList($result, $notFoundIds);
    }
}

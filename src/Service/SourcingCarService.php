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
use Teas\AlphaApiClient\Factory\DataObject\Response\ListDOFactory;
use Teas\AlphaApiClient\Factory\Request\SourcingCarRequestFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Request\Car\PostAvailableCarsRequest;

use function json_decode;

class SourcingCarService extends BaseAuthorizationService
{
    public const KEY_RESULT = 'result';
    public const KEY_WARNING = 'warning';
    public const KEY_MESSAGE = 'message';

    /**
     * @var SourcingCarRequestFactory
     */
    private $carRequestFactory;

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
     * @param SourcingCarRequestFactory $carRequestFactory
     * @param ResponseMapperFactory $responseMapperFactory
     * @param ListDOFactory $listResponseFactory
     * @param TokenProviderInterface $tokenProvider
     */
    public function __construct(
        AdapterInterface $adapter,
        TokenProviderInterface $tokenProvider,
        SourcingCarRequestFactory $carRequestFactory,
        ResponseMapperFactory $responseMapperFactory,
        ListDOFactory $listResponseFactory
    ) {
        parent::__construct($adapter, $tokenProvider);
        $this->carRequestFactory = $carRequestFactory;
        $this->responseMapperFactory = $responseMapperFactory;
        $this->listDOFactory = $listResponseFactory;
    }

    /**
     * @param array<mixed> $searchParams
     * @param int $size
     * @param int $offset
     * @param array<string> $orderBy
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws AwsAuthenticationException
     * @throws ErrorResponseException
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
        $mapper = $this->responseMapperFactory->createAvailableCarResponseMapper();
        $result = [];

        foreach ($responseData[self::KEY_RESULT] as $data) {
            $result[] = $mapper->map($data);
        }

        return $this->listDOFactory->createSimpleList($result);
    }

    /**
     * @param string $id
     * @throws CarNotFoundException
     * @throws ErrorResponseException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws AwsAuthenticationException
     * @return Car
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
        $data = reset($responseData[self::KEY_RESULT]);

        return $mapper->map($data);
    }

    /**
     * @param array<string> $ids
     * @param int $size
     * @param int $offset
     * @param array<string> $orderBy
     * @throws ErrorResponseException
     * @return CarList
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
            return $this->listDOFactory->createCarList([], $ids);
        }

        if ($response->isError()) {
            throw new ErrorResponseException($response->getResponseData(), $response->getHttpCode());
        }

        $responseData = json_decode($response->getResponseData(), true);
        $notFoundIds = $this->parseNotFoundIds($responseData);
        $mapper = $this->responseMapperFactory->createCarResponseMapper();
        $result = [];

        foreach ($responseData[self::KEY_RESULT] as $data) {
            $result[] = $mapper->map($data);
        }

        return $this->listDOFactory->createCarList($result, $notFoundIds);
    }

    /**
     * @param array<mixed> $responseData
     * @return array<string>
     */
    private function parseNotFoundIds(array &$responseData): array
    {
        $warningData = reset($responseData[self::KEY_WARNING]) ?: [];
        $message = $warningData[self::KEY_MESSAGE] ?? '';

        if (empty($message)) {
            return [];
        }

        $message = preg_replace(['/.*\[/', '/\].*/', "/'/", '/ /'], '', $message);

        return explode(',', $message);
    }
}

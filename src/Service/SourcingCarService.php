<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use BootIq\ServiceLayer\Enum\HttpCode;
use Teas\AlphaApiClient\DataObject\Request\AvailableCarsFilter;
use Teas\AlphaApiClient\DataObject\Response\Car;
use Teas\AlphaApiClient\DataObject\Response\CarList;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\Enum\ResponseDataKey;
use Teas\AlphaApiClient\Exception\AwsAuthenticationException;
use Teas\AlphaApiClient\Exception\CarNotFoundException;
use Teas\AlphaApiClient\Exception\ErrorResponseException;
use Teas\AlphaApiClient\Factory\DataObject\Response\ListDOFactory;
use Teas\AlphaApiClient\Factory\Request\SourcingCarRequestFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Request\Car\PostAvailableCarsRequest;
use Teas\AlphaApiClient\Traits\ErrorResponseTrait;

use function json_decode;

class SourcingCarService extends BaseAuthorizationService
{
    use ErrorResponseTrait;

    public const WARNING_UNAVAILABLE_ITEMS = 'unavailable_items';

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
     * @param AvailableCarsFilter $filter
     * @param int $size
     * @param int $offset
     * @param array<string> $orderBy
     * @param string|null $currency
     * @throws ErrorResponseException
     * @return SimpleList
     */
    public function getAvailableCarsList(
        AvailableCarsFilter $filter,
        int $size = PostAvailableCarsRequest::DEFAULT_SIZE,
        int $offset = PostAvailableCarsRequest::DEFAULT_OFFSET,
        array $orderBy = [],
        ?string $currency = null
    ): SimpleList {
        $request = $this->carRequestFactory
            ->createPostAvailableCarsRequest($filter, $size, $offset, $orderBy, $currency);
        $response = $this->callRequest($request);
        $this->processCommonError($response);
        $responseData = json_decode($response->getResponseData(), true);
        $mapper = $this->responseMapperFactory->createAvailableCarResponseMapper();
        $result = [];

        foreach ($responseData[ResponseDataKey::RESULT] as $data) {
            $result[] = $mapper->map($data);
        }

        return $this->listDOFactory->createSimpleList($result);
    }

    /**
     * @param string $id
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws AwsAuthenticationException
     * @throws CarNotFoundException
     * @throws ErrorResponseException
     * @return Car
     */
    public function getCar(string $id): Car
    {
        $request = $this->carRequestFactory->createPostCarsRequest([$id]);
        $response = $this->callRequest($request);

        if ($response->isError() && HttpCode::HTTP_CODE_NOT_FOUND === $response->getHttpCode()) {
            throw new CarNotFoundException(sprintf('Car id: %s not found.', $id), $response->getHttpCode());
        }

        $this->processCommonError($response);
        $responseData = json_decode($response->getResponseData(), true);
        $mapper = $this->responseMapperFactory->createCarResponseMapper();
        $data = reset($responseData[ResponseDataKey::RESULT]);

        return $mapper->map($data);
    }

    /**
     * @param array<string> $ids
     * @param int|null $size
     * @param int|null $offset
     * @param array<string> $orderBy
     * @throws ErrorResponseException
     * @return CarList
     */
    public function getCarsListByIds(
        array $ids,
        ?int $size = null,
        ?int $offset = null,
        array $orderBy = []
    ): CarList {
        $request = $this->carRequestFactory->createPostCarsRequest($ids, $size, $offset, $orderBy);
        $response = $this->callRequest($request);

        if ($response->isError() && HttpCode::HTTP_CODE_NOT_FOUND === $response->getHttpCode()) {
            return $this->listDOFactory->createCarList([], $ids);
        }

        $this->processCommonError($response);
        $responseData = json_decode($response->getResponseData(), true);
        $notFoundIds = $this->parseNotFoundIds($responseData);
        $mapper = $this->responseMapperFactory->createCarResponseMapper();
        $result = [];

        foreach ($responseData[ResponseDataKey::RESULT] as $data) {
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
        $warnings = $responseData[ResponseDataKey::WARNINGS] ?? [];

        if (empty($warnings)) {
            return [];
        }

        foreach ($warnings as $warning) {
            if (self::WARNING_UNAVAILABLE_ITEMS === $warning[ResponseDataKey::WARNING_TYPE]) {
                return $warning[ResponseDataKey::ITEM_IDS];
            }
        }

        return [];
    }
}

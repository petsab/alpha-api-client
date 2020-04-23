<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\DataObject\Response\SourcingCar;
use Teas\AlphaApiClient\Exception\ErrorResponseException;
use Teas\AlphaApiClient\Factory\ResponseDataObjectFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Request\PostAvailableCarsRequest;
use Teas\AlphaApiClient\Request\SourcingCarRequestFactory;

use function json_decode;

class SourcingCarService
{
    /**
     * @var AdapterInterface
     */
    private $adapter;

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
     * SourcingCarDataProvider constructor.
     * @param AdapterInterface $adapter
     * @param SourcingCarRequestFactory $carRequestFactory
     * @param ResponseMapperFactory $responseMapperFactory
     * @param ResponseDataObjectFactory $responseDataObjectFactory
     */
    public function __construct(
        AdapterInterface $adapter,
        SourcingCarRequestFactory $carRequestFactory,
        ResponseMapperFactory $responseMapperFactory,
        ResponseDataObjectFactory $responseDataObjectFactory
    ) {
        $this->adapter = $adapter;
        $this->carRequestFactory = $carRequestFactory;
        $this->responseMapperFactory = $responseMapperFactory;
        $this->responseDataObjectFactory = $responseDataObjectFactory;
    }

    /**
     * @param array<mixed> $searchParams
     * @param int $offset
     * @param int $size
     * @param array<string> $orderBy
     * @return SimpleList
     * @throws ErrorResponseException
     */
    public function getAvailableCarsFromApi(
        array $searchParams,
        int $size = PostAvailableCarsRequest::DEFAULT_SIZE,
        int $offset = PostAvailableCarsRequest::DEFAULT_OFFSET,
        array $orderBy = []
    ): SimpleList {
        $request = $this->carRequestFactory->createPostAvailableCarsRequest($searchParams, $size, $offset, $orderBy);
        $response = $this->adapter->call($request);

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
     * @param array<mixed> $searchParams
     * @param int $offset
     * @param int $size
     * @param array<string> $orderBy
     * @return SimpleList
     * @throws ErrorResponseException
     */
    public function getAvailableCars(
        array $searchParams,
        int $size = PostAvailableCarsRequest::DEFAULT_SIZE,
        int $offset = PostAvailableCarsRequest::DEFAULT_OFFSET,
        array $orderBy = []
    ): SimpleList {
        $data = json_decode($this->getMockData(), true);
        $mapper = $this->responseMapperFactory->createSourcingCarResponseMapper();
        $car = $mapper->map($data);
        $result = [];

        for ($i = 1; $i <= $size; $i++) {
            $result[] = $car;
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

        return $mapper->map($data);
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
}

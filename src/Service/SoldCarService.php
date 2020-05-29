<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use BootIq\ServiceLayer\Enum\HttpCode;
use Teas\AlphaApiClient\DataObject\Request\SoldCarsFilter;
use Teas\AlphaApiClient\DataObject\Response\SimpleList;
use Teas\AlphaApiClient\Enum\ResponseDataKey;
use Teas\AlphaApiClient\Exception\ErrorResponseException;
use Teas\AlphaApiClient\Factory\DataObject\Response\ListDOFactory;
use Teas\AlphaApiClient\Factory\Request\SoldCarRequestFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Request\Car\PostAvailableCarsRequest;
use Teas\AlphaApiClient\Traits\ErrorResponseTrait;

use function json_decode;

class SoldCarService extends BaseAuthorizationService
{
    use ErrorResponseTrait;

    /**
     * @var SoldCarRequestFactory
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
     * @param TokenProviderInterface $tokenProvider
     * @param SoldCarRequestFactory $carRequestFactory
     * @param ResponseMapperFactory $responseMapperFactory
     * @param ListDOFactory $listResponseFactory
     */
    public function __construct(
        AdapterInterface $adapter,
        TokenProviderInterface $tokenProvider,
        SoldCarRequestFactory $carRequestFactory,
        ResponseMapperFactory $responseMapperFactory,
        ListDOFactory $listResponseFactory
    ) {
        parent::__construct($adapter, $tokenProvider);
        $this->carRequestFactory = $carRequestFactory;
        $this->responseMapperFactory = $responseMapperFactory;
        $this->listDOFactory = $listResponseFactory;
    }

    /**
     * @param SoldCarsFilter $filter
     * @param int $size
     * @throws ErrorResponseException
     * @return SimpleList
     */
    public function getTopSellingCarsList(
        SoldCarsFilter $filter,
        int $size = PostAvailableCarsRequest::DEFAULT_SIZE
    ): SimpleList {
        $request = $this->carRequestFactory->createPostTopSellingCarsRequest($filter, $size);
        $response = $this->callRequest($request);

        if ($response->isError() && HttpCode::HTTP_CODE_NOT_FOUND === $response->getHttpCode()) {
            return $this->listDOFactory->createSimpleList([]);
        }

        $this->processCommonError($response);
        $responseData = json_decode($response->getResponseData(), true);
        $mapper = $this->responseMapperFactory->createTopSellingCarResponseMapper();
        $result = [];

        foreach ($responseData[ResponseDataKey::RESULT] as $data) {
            $result[] = $mapper->map($data);
        }

        return $this->listDOFactory->createSimpleList($result);
    }
}

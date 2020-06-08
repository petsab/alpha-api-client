<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use Teas\AlphaApiClient\DataObject\Request\SimilarCarsFilter;
use Teas\AlphaApiClient\DataObject\Response\SimpleCarList;
use Teas\AlphaApiClient\Enum\ResponseDataKey;
use Teas\AlphaApiClient\Exception\ErrorResponseException;
use Teas\AlphaApiClient\Factory\DataObject\Response\ListDOFactory;
use Teas\AlphaApiClient\Factory\Request\SimilarCarRequestFactory;
use Teas\AlphaApiClient\Factory\ResponseMapperFactory;
use Teas\AlphaApiClient\Traits\ErrorResponseTrait;

use function json_decode;

class SimilarCarService extends BaseAuthorizationService
{
    use ErrorResponseTrait;

    /**
     * @var SimilarCarRequestFactory
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
     * @param SimilarCarRequestFactory $carRequestFactory
     * @param ResponseMapperFactory $responseMapperFactory
     * @param ListDOFactory $listResponseFactory
     */
    public function __construct(
        AdapterInterface $adapter,
        TokenProviderInterface $tokenProvider,
        SimilarCarRequestFactory $carRequestFactory,
        ResponseMapperFactory $responseMapperFactory,
        ListDOFactory $listResponseFactory
    ) {
        parent::__construct($adapter, $tokenProvider);
        $this->carRequestFactory = $carRequestFactory;
        $this->responseMapperFactory = $responseMapperFactory;
        $this->listDOFactory = $listResponseFactory;
    }

    /**
     * @param SimilarCarsFilter $filter
     * @param int $window
     * @param string|null $currency
     * @throws ErrorResponseException
     * @return SimpleCarList
     */
    public function getSimilarCarsList(SimilarCarsFilter $filter, int $window, ?string $currency = null): SimpleCarList
    {
        $request = $this->carRequestFactory->createPostSimilarCarsRequest($filter, $window, $currency);
        $response = $this->callRequest($request);
        $this->processCommonError($response);
        $responseData = json_decode($response->getResponseData(), true);
        $mapper = $this->responseMapperFactory->createSimilarCarResponseMapper();
        $result = [];

        foreach ($responseData[ResponseDataKey::RESULT] as $data) {
            $result[] = $mapper->map($data);
        }

        return $this->listDOFactory->createSimpleCarList($result);
    }
}

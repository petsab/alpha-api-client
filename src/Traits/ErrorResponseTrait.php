<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Traits;

use BootIq\ServiceLayer\Response\ResponseInterface;
use Teas\AlphaApiClient\Enum\ResponseDataKey;
use Teas\AlphaApiClient\Exception\ErrorResponseException;

trait ErrorResponseTrait
{
    /**
     * @param ResponseInterface $response
     * @throws ErrorResponseException
     */
    protected function processCommonError(ResponseInterface $response): void
    {
        if ($response->isError()) {
            $responseData = json_decode($response->getResponseData(), true);
            $msg = $responseData[ResponseDataKey::BAD_REQUEST_DETAIL] ?? $response->getResponseData();
            throw new ErrorResponseException($msg, $response->getHttpCode());
        }
    }
}

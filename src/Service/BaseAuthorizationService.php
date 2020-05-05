<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Service;

use BootIq\ServiceLayer\Adapter\AdapterInterface;
use BootIq\ServiceLayer\Enum\HttpCode;
use BootIq\ServiceLayer\Request\RequestInterface;
use BootIq\ServiceLayer\Response\ResponseInterface;
use Teas\AlphaApiClient\Enum\HttpHeader;

abstract class BaseAuthorizationService
{

    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @var TokenProviderInterface
     */
    protected $tokenProvider;

    /**
     * BaseAuthorizationService constructor.
     * @param AdapterInterface $adapter
     * @param TokenProviderInterface $tokenProvider
     */
    public function __construct(AdapterInterface $adapter, TokenProviderInterface $tokenProvider)
    {
        $this->adapter = $adapter;
        $this->tokenProvider = $tokenProvider;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    protected function callRequest(RequestInterface $request): ResponseInterface
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

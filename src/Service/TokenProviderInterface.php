<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Service;

interface TokenProviderInterface
{
    /**
     * @return string
     */
    public function getToken(): string;

    /**
     * @return string
     */
    public function renewToken(): string;
}

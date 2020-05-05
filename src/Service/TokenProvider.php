<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Service;

use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use Aws\CognitoIdentityProvider\Exception\CognitoIdentityProviderException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Psr\SimpleCache\CacheInterface;
use Teas\AlphaApiClient\Exception\AwsAuthenticationException;

class TokenProvider implements TokenProviderInterface
{
    private const HASHING_ALGORITHM = 'sha256';
    private const AUTHENTICATION_RESULT_KEY = 'AuthenticationResult';
    private const ID_TOKEN_KEY = 'IdToken';
    private const TOKEN_KEY = 'id_token';
    private const TOKEN_TYPE = 'Bearer';

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * @var array<string>
     */
    private $credentials;

    /**
     * @param CacheInterface $cache
     * @param array<string> $credentials
     */
    public function __construct(CacheInterface $cache, array $credentials)
    {
        $this->cache = $cache;
        $this->credentials = $credentials;
        $this->logger = new NullLogger();
    }

    /**
     * @param LoggerInterface $logger
     * @return TokenProvider
     */
    public function setLogger(LoggerInterface $logger): TokenProvider
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws AwsAuthenticationException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getToken(): string
    {
        if ($this->cache->has(self::TOKEN_KEY)) {
            return $this->cache->get(self::TOKEN_KEY);
        }

        $token = sprintf('%s %s', self::TOKEN_TYPE, $this->getAwsToken());
        $result = $this->cache->set(self::TOKEN_KEY, $token);

        if (false === $result) {
            $this->logger->warning('Cannot save token to cache.');
        }

        return $token;
    }

    /**
     * {@inheritdoc}
     *
     * @throws AwsAuthenticationException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function renewToken(): string
    {
        $this->cache->delete(self::TOKEN_KEY);

        return $this->getToken();
    }

    /**
     * @throws AwsAuthenticationException
     * @return string
     */
    private function getAwsToken(): string
    {
        $client = new CognitoIdentityProviderClient([
            'credentials' => [
                'key' => $this->credentials['appClientId'],
                'secret' => $this->credentials['appClientSecret'],
            ],
            'region' => $this->credentials['region'],
            'version' => 'latest',
        ]);
        $hash = hash_hmac(
            self::HASHING_ALGORITHM,
            $this->credentials['username'] . $this->credentials['appClientId'],
            $this->credentials['appClientSecret'],
            true
        );
        try {
            $response = $client->initiateAuth([
                'ClientId' => $this->credentials['appClientId'],
                'AuthFlow' => 'USER_PASSWORD_AUTH',
                'AuthParameters' => [
                    'USERNAME' => $this->credentials['username'],
                    'PASSWORD' => $this->credentials['password'],
                    'SECRET_HASH' => base64_encode($hash),
                ],
                'UserPoolId' => $this->credentials['userPoolId'],
            ]);
        } catch (CognitoIdentityProviderException $exception) {
            $this->logger->error((string) $exception->getAwsErrorMessage(), [$exception->getTraceAsString()]);
            throw new AwsAuthenticationException((string) $exception->getAwsErrorMessage());
        }

        $authenticationResult = $response->get(self::AUTHENTICATION_RESULT_KEY);
        $token = $authenticationResult[self::ID_TOKEN_KEY] ?? null;

        if (null === $token) {
            $this->logger->error('Cannot find token in Aws response.');
            throw new AwsAuthenticationException('Cannot find token in Aws response.');
        }

        return $token;
    }
}

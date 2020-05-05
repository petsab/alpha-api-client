Alpha Api client
========

## Installation

```bash
composer require teas/alpha-api-client
```

## Usage
```php
$credentials = [
    'username' => 'username',
    'password' => 'password',
    'appClientId' => 'appClientId',
    'appClientSecret' => 'appClientSecret',
    'userPoolId' => 'userPooldId',
    'region' => 'region',
];

/** @var Psr\SimpleCache\CacheInterface $cache */
$cache = new CacheInterface;

$tokenProvider = new \Teas\AlphaApiClient\Service\TokenProvider($cache, $credentials);

$adapter = new \BootIq\ServiceLayer\Adapter\GuzzleAdapter(
    new \GuzzleHttp\Client(),
    new \BootIq\ServiceLayer\Response\ResponseFactory,
    $urn
);

$alphaService = new \Teas\AlphaApiClient\Service\SourcingCarService(
    $adapter,
    $tokenProvider,
    new Teas\AlphaApiClient\Factory\SourcingCarRequestFactory(),
    new Teas\AlphaApiClient\Factory\ResponseMapperFactory(),
    new Teas\AlphaApiClient\Factory\ResponseDataObjectFactory()
);
```
Alpha Api client
========

## Installation

```bash
composer require teas/alpha-api-client
```

## Usage
```php
$adapter = new \BootIq\ServiceLayer\Adapter\GuzzleAdapter(
    new \GuzzleHttp\Client(),
    new \BootIq\ServiceLayer\Response\ResponseFactory,
    $urn
);

$alphaService = new \Teas\AlphaApiClient\Service\SourcingCarService(
    $adapter,
    new Teas\AlphaApiClient\Request\SourcingCarRequestFactory(),
    new Teas\AlphaApiClient\Factory\ResponseMapperFactory(),
    new Teas\AlphaApiClient\Factory\ResponseDataObjectFactory()
);
```
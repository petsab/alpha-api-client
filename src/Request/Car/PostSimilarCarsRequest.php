<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Request\Car;

use BootIq\ServiceLayer\Request\PostMethod;
use Teas\AlphaApiClient\DataObject\Request\SimilarCarsFilter;

class PostSimilarCarsRequest extends PostMethod
{
    /**
     * @var SimilarCarsFilter
     */
    private $filter;

    /**
     * @var int
     */
    private $window;

    /**
     * @var string|null
     */
    private $currency;

    /**
     * @param SimilarCarsFilter $filter
     * @param int $window
     * @param string|null $currency
     */
    public function __construct(SimilarCarsFilter $filter, int $window, ?string $currency)
    {
        $this->filter = $filter;
        $this->window = $window;
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        $queryParams = [];
        $queryParams[] = 'window=' . $this->window;

        if (!empty($this->currency)) {
            $queryParams[] = 'currency=' . $this->currency;
        }

        return sprintf(
            'similar_cars?%s',
            implode('&', $queryParams)
        );
    }

    /**
     * @return array<mixed>|null
     */
    public function getData()
    {
        return $this->filter->toArray();
    }
}

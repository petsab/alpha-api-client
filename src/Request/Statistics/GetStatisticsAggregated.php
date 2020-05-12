<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Request\Statistics;

use BootIq\ServiceLayer\Request\GetMethod;
use GuzzleHttp\RequestOptions;
use Teas\AlphaApiClient\DataObject\Request\StatisticsAggregatedParams;

class GetStatisticsAggregated extends GetMethod
{
    /**
     * @var array<string>
     */
    private $levels;

    /**
     * @var array<string>
     */
    private $region;

    /**
     * @var StatisticsAggregatedParams
     */
    private $params;

    /**
     * @param array<string> $levels
     * @param array<string> $region
     * @param StatisticsAggregatedParams $params
     */
    public function __construct(array $levels, array $region, StatisticsAggregatedParams $params)
    {
        $this->levels = $levels;
        $this->region = $region;
        $this->params = $params;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpoint(): string
    {
        return sprintf(
            'statistics/aggregated/%s',
            implode(',', $this->levels)
        );
    }

    /**
     * @return array<string>|null
     */
    public function getData()
    {
        $data = [];
        $data['region'] = implode(',', $this->region);
        foreach ($this->params->toArray() as $key => $value) {
            if (is_array($value)) {
                $data[$key] = implode(',', $value);
                continue;
            }
            $data[$key] = $value;
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getDataRequestOption(): string
    {
        return RequestOptions::QUERY;
    }
}

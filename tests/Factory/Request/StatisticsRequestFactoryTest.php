<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Factory\Request;

use GuzzleHttp\RequestOptions;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\StatisticsAggregatedParams;
use Teas\AlphaApiClient\Enum\AggregationLevel;
use Teas\AlphaApiClient\Exception\InvalidArgumentException;
use Teas\AlphaApiClient\Factory\Request\StatisticsRequestFactory;
use Teas\AlphaApiClient\Request\Statistics\GetStatisticsAggregated;

class StatisticsRequestFactoryTest extends TestCase
{
    /**
     * @var StatisticsRequestFactory
     */
    private $factory;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->factory = new StatisticsRequestFactory();
    }

    public function testGetStatisticAggregatedSuccess()
    {
        $levels = [];
        $levelCount = count(AggregationLevel::LEVEL_AVAILABLE);
        for ($i = rand(1, 4); $i > 0; $i--) {
            $rand = rand(0, ($levelCount - 1));
            $levels[] = AggregationLevel::LEVEL_AVAILABLE[$rand];
        }
        $levels = array_unique($levels);
        $regions = [];
        for ($i = rand(1, 4); $i > 0; $i--) {
            $regions[] = uniqid();
        }
        $params = new StatisticsAggregatedParams();
        $currency = uniqid();
        $params->setCurrency($currency);

        $years = [];
        for ($i = rand(1, 4); $i > 0; $i--) {
            $years[] = rand(2000, 2020);
        }
        $years = array_unique($years);
        $params->setYear($years);

        $request = $this->factory->createGetStatisticsAggregatedRequest($levels, $regions, $params);

        $this->assertInstanceOf(GetStatisticsAggregated::class, $request);
        $this->assertEquals(RequestOptions::QUERY, $request->getDataRequestOption());
        $this->assertEquals(
            [
                'region' => implode(',', $regions),
                'currency' => $currency,
                'year' => implode(',', $years),
            ],
            $request->getData()
        );
        $this->assertEquals('statistics/aggregated/' . implode(',', $levels), $request->getEndpoint());
    }

    /**
     * @dataProvider getTestGetStatisticAggregatedValidationData
     * @param array $levels
     * @param array $regions
     * @throws InvalidArgumentException
     */
    public function testGetStatisticAggregatedValidation(array $levels, array $regions)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->factory->createGetStatisticsAggregatedRequest($levels, $regions, new StatisticsAggregatedParams());
    }

    /**
     * @return array
     */
    public function getTestGetStatisticAggregatedValidationData(): array
    {
        return [
            [
                [],
                [],
            ],
            [
                [],
                [uniqid()],
            ],
            [
                [uniqid()],
                [],
            ],
            [
                [uniqid()],
                [uniqid()],
            ],
        ];
    }
}

<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\ResponseMapper;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\Factory\ResponseDataObjectFactory;
use Teas\AlphaApiClient\ResponseMapper\SourcingCarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\UrlResponseMapper;
use Teas\AlphaApiClient\Traits\NullableDateTimeTrait;

class UrlTest extends TestCase
{
    use NullableDateTimeTrait;

    /**
     * @var ResponseDataObjectFactory
     */
    private $factory;

    /**
     * @var UrlResponseMapper
     */
    private $urlResponseMapper;

    public function setUp(): void
    {
        parent::setUp();
        $this->factory = new ResponseDataObjectFactory();
        $this->urlResponseMapper = new UrlResponseMapper($this->factory);
    }

    /**
     * @dataProvider getCreateSourcingCarFromResponseInput
     * @param string $input
     * @throws \Exception
     */
    public function testCreateSourcingCarFromResponse(string $input)
    {
        $response = json_decode($input, true);
        $mapper = new SourcingCarResponseMapper($this->factory, $this->urlResponseMapper);
        $car = $mapper->map($response);
        $this->assertSame($response['PK'], $car->getId());
        $this->assertSame($response['ad_id'], $car->getAdId());
        $this->assertSame($response['body_type'], $car->getBodyType());
        $this->assertSame($response['buyer_country'], $car->getBuyerCountry());
        $this->assertSame($response['condition'], $car->getCondition());
        $this->assertSame($response['cubic_capacity'], $car->getCubicCapacity());
        $this->assertSame($response['days_on_stock'], $car->getDaysOnStock());
        $this->assertSame($response['drive_type'], $car->getDriveType());
        $this->assertSame($response['feature_score'], $car->getFeatureScore());
        $this->assertSame($response['features'], $car->getFeatures());
        $this->assertSame($response['currency'], $car->getPrice()->getCurrency());
        $this->assertSame($response['first_occurrence'], $car->getOccurrence()->getFirst()->format('Y-m-d'));
        $this->assertSame($response['fuel_type'], $car->getFuelType());
        $this->assertSame($response['interior_material'], $car->getInteriorMaterial());
        $this->assertSame($response['last_occurrence'], $car->getOccurrence()->getLast()->format('Y-m-d'));
        $this->assertSame($response['make'], $car->getMake());
        $this->assertSame($response['mileage'], $car->getMileage());
        $this->assertSame($response['meta_updated_timestamp'], $car->getMetaUpdated()->format(DATE_ATOM));
        $this->assertSame($response['mobile_de_url']['full'], $car->getMobileDeUrl()->getFull());
        $this->assertSame($response['model'], $car->getModel());
        $this->assertSame($response['number_of_seats'], $car->getNumberOfSeats());
        $this->assertSame($response['power'], $car->getPower());
        $this->assertSame($response['premium_features'], $car->getPremiumFeatures());
        $this->assertSame($response['price_change'], $car->getPrice()->getChange());
        $this->assertSame($response['price_with_vat'], $car->getPrice()->getWithVat());
        $this->assertSame($response['price_with_vat_czk'], $car->getPrice()->getWithVatCzk());
        $this->assertSame($response['price_with_vat_eur'], $car->getPrice()->getWithVatEur());
        $this->assertSame($response['retail_price_czk'], $car->getPrice()->getRetailPriceCzk());
        $this->assertSame($response['origin_country'], $car->getOriginCountry());
        $this->assertSame($response['sauto_url']['full'], $car->getSAutoUrl()->getFull());
        $this->assertSame($response['seller']['address'], $car->getSeller()->getAddress());
        $this->assertSame($response['seller']['city'], $car->getSeller()->getCity());
        $this->assertSame($response['seller']['email'], $car->getSeller()->getEmail());
        $this->assertSame($response['seller']['name'], $car->getSeller()->getName());
        $this->assertSame($response['seller']['phone'], $car->getSeller()->getPhone());
        $this->assertSame($response['seller']['rating_average'], $car->getSeller()->getRating()->getAverage());
        $this->assertSame($response['seller']['rating_count'], $car->getSeller()->getRating()->getCount());
        $this->assertSame($response['seller']['type'], $car->getSeller()->getType());
        $this->assertSame($response['seller_country'], $car->getSeller()->getCountry());
        $this->assertSame($response['server'], $car->getServer());
        $this->assertSame($response['technical_inspection_valid_to'], $this->nullableDateTimeToString(
            $car->getTechnicalInspectionValidTo(),
            'Y-m-d'
        ));
        $this->assertSame($response['transmission'], $car->getTransmission());
        $this->assertSame($response['url']['full'], $car->getUrl()->getFull());
        $this->assertSame($response['vat_rate'], $car->getPrice()->getVatRate());
        $this->assertSame($response['vat_reclaimable'], $car->getPrice()->isVatReclaimable());
        $this->assertSame($response['measure_car_rank'], $car->getMeasure()->getCarRank());
        $this->assertSame($response['measure_count_relevant_car'], $car->getMeasure()->getCountRelevantCar());
        $this->assertSame($response['measure_delta'], $car->getMeasure()->getDelta());
        $this->assertSame($response['measure_level'], $car->getMeasure()->getLevel());
        $this->assertSame($response['measure_liquidity'], $car->getMeasure()->getLiquidity());
        $this->assertSame($response['measure_rate'], $car->getMeasure()->getRate());
        $this->assertSame($response['measure_relative_price_position'], $car->getMeasure()->getRelativePricePosition());
        $this->assertSame($response['measure_retail_price_position'], $car->getMeasure()->getRetailPricePosition());
        $this->assertSame($response['measure_sold_range_category'], $car->getMeasure()->getSoldRangeCategory());
        $this->assertSame($response['measure_total_score'], $car->getMeasure()->getTotalScore());
        $this->assertSame($response['thumbnail_url']['full'], $car->getThumbnailUrl()->getFull());
    }

    /**
     * @return array
     */
    public function getCreateSourcingCarFromResponseInput()
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . "input" . DIRECTORY_SEPARATOR . "testCreateSourcingCarFromResponse.php";

        return include $path;
    }
}

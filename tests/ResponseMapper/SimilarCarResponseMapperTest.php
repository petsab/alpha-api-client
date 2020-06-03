<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\ResponseMapper;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\Factory\DataObject\Response\CarDOFactory;
use Teas\AlphaApiClient\Factory\DataObject\Response\DataObjectFactory;
use Teas\AlphaApiClient\ResponseMapper\AvailableCarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\SimilarCarResponseMapper;
use Teas\AlphaApiClient\ResponseMapper\UrlResponseMapper;
use Teas\AlphaApiClient\Traits\NullableDateTimeTrait;

class SimilarCarResponseMapperTest extends TestCase
{
    use NullableDateTimeTrait;

    /**
     * @var DataObjectFactory
     */
    private $doFactory;

    /**
     * @var CarDOFactory
     */
    private $carDOFactory;

    /**
     * @var UrlResponseMapper
     */
    private $urlResponseMapper;

    public function setUp(): void
    {
        parent::setUp();
        $this->doFactory = new DataObjectFactory();
        $this->urlResponseMapper = new UrlResponseMapper($this->doFactory);
        $this->carDOFactory = new CarDOFactory();
    }

    /**
     * @dataProvider getCreateSimilarCarFromResponseInput
     * @param string $input
     * @throws \Exception
     */
    public function testCreateSourcingCarFromResponse(string $input)
    {
        $response = json_decode($input, true);
        $mapper = new SimilarCarResponseMapper($this->carDOFactory, $this->urlResponseMapper);
        $car = $mapper->map($response);
        $this->assertSame($response['PK'], $car->getId());
        $this->assertSame($response['ad_id'], $car->getAdId());
        $this->assertSame($response['car_style'], $car->getCarStyle());
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
        $this->assertSame($response['price_change'], $car->getPrice()->getChange());
        $this->assertSame($response['price_with_vat'], $car->getPrice()->getWithVat());
        $this->assertSame($response['original_price_with_vat'], $car->getPrice()->getOriginalWithVat());
        $this->assertSame($response['original_currency'], $car->getPrice()->getOriginalCurrency());
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
        $this->assertSame($response['thumbnail_url']['full'], $car->getThumbnailUrl()->getFull());
        $this->assertSame($response['similarity_level'], $car->getSimilarity()->getLevel());
        $this->assertSame($response['similarity_score'], $car->getSimilarity()->getScore());
    }

    /**
     * @return array
     */
    public function getCreateSimilarCarFromResponseInput()
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . "input" . DIRECTORY_SEPARATOR . "testCreateSimilarCarFromResponse.php";

        return include $path;
    }
}

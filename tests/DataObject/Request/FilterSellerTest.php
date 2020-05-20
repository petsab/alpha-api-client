<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Request;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\FilterBranch;
use Teas\AlphaApiClient\DataObject\Request\FilterBuyer;
use Teas\AlphaApiClient\DataObject\Request\FilterSeller;
use Teas\AlphaApiClient\DataObject\Request\FloatRange;

class FilterSellerTest extends TestCase
{
    public function testAllValues()
    {
        $countries = [uniqid(), uniqid()];
        $server = uniqid();
        $type = uniqid();
        $ranking = (float) rand() / (float) getrandmax();
        $seller = new FilterSeller($countries, $server, $type, $ranking);
        $this->assertSame($countries, $seller->getCountry());
        $this->assertSame($server, $seller->getServer());
        $this->assertSame($type, $seller->getType());
        $this->assertSame($ranking, $seller->getRanking());
        $data = [
            'country' => $countries,
            'server' => $server,
            'type' => $type,
            'ranking' => $ranking,
        ];
        $this->assertSame($data, $seller->toArray());
    }

    public function testWithoutRanking()
    {
        $countries = [uniqid(), uniqid()];
        $server = uniqid();
        $type = uniqid();
        $seller = new FilterSeller($countries, $server, $type);
        $this->assertNull($seller->getRanking());
        $data = [
            'country' => $countries,
            'server' => $server,
            'type' => $type,
        ];
        $this->assertSame($data, $seller->toArray());
    }

    public function testWithoutServer()
    {
        $countries = [uniqid(), uniqid()];
        $type = uniqid();
        $ranking = (float) rand() / (float) getrandmax();
        $seller = new FilterSeller($countries, null, $type, $ranking);
        $this->assertNull($seller->getServer());
        $data = [
            'country' => $countries,
            'type' => $type,
            'ranking' => $ranking,
        ];
        $this->assertSame($data, $seller->toArray());
    }

    public function testWithoutType()
    {
        $countries = [uniqid(), uniqid()];
        $server = uniqid();
        $ranking = (float) rand() / (float) getrandmax();
        $seller = new FilterSeller($countries, $server, null, $ranking);
        $this->assertNull($seller->getType());
        $data = [
            'country' => $countries,
            'server' => $server,
            'ranking' => $ranking,
        ];
        $this->assertSame($data, $seller->toArray());
    }

    public function testOnlyCountry()
    {
        $countries = [uniqid(), uniqid()];
        $seller = new FilterSeller($countries);
        $data = [
            'country' => $countries,
        ];
        $this->assertSame($data, $seller->toArray());
    }
}

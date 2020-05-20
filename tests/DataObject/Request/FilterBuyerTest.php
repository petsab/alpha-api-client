<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Request;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\FilterBranch;
use Teas\AlphaApiClient\DataObject\Request\FilterBuyer;
use Teas\AlphaApiClient\DataObject\Request\FloatRange;

class FilterBuyerTest extends TestCase
{
    public function testAllValues()
    {
        $country = uniqid();
        $branch = $this->createMock(FilterBranch::class);
        $branchData = [
            'address' => uniqid(),
            'zip' => uniqid(),
        ];
        $branch->expects(self::once())
            ->method('toArray')
            ->willReturn($branchData);
        $buyer = new FilterBuyer($country, $branch);
        $this->assertSame($country, $buyer->getCountry());
        $this->assertSame($branch, $buyer->getBranch());
        $data = [
            'country' => $country,
            'branch' => $branchData,
        ];
        $this->assertSame($data, $buyer->toArray());
    }

    public function testOnlyCountry()
    {
        $country = uniqid();
        $buyer = new FilterBuyer($country);
        $this->assertSame($country, $buyer->getCountry());
        $this->assertNull($buyer->getBranch());
        $data = [
            'country' => $country,
        ];
        $this->assertSame($data, $buyer->toArray());
    }
}

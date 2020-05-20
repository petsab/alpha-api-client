<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Request;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\FilterBranch;
use Teas\AlphaApiClient\DataObject\Request\FloatRange;

class FilterBranchTest extends TestCase
{
    public function testBothValuesSet()
    {
        $address = uniqid();
        $zip = uniqid();
        $branch = new FilterBranch($address, $zip);
        $this->assertSame($address, $branch->getAddress());
        $this->assertSame($zip, $branch->getZip());
        $data = [
            'address' => $branch->getAddress(),
            'zip' => $branch->getZip(),
        ];
        $this->assertSame($data, $branch->toArray());
    }

    public function testOnlyAddress()
    {
        $address = uniqid();
        $branch = new FilterBranch($address);
        $this->assertSame($address, $branch->getAddress());
        $this->assertNull($branch->getZip());
        $data = [
            'address' => $branch->getAddress(),
        ];
        $this->assertSame($data, $branch->toArray());
    }

    public function testOnlyZip()
    {
        $zip = uniqid();
        $branch = new FilterBranch(null, $zip);
        $this->assertSame($zip, $branch->getZip());
        $this->assertNull($branch->getAddress());
        $data = [
            'zip' => $branch->getZip(),
        ];
        $this->assertSame($data, $branch->toArray());
    }
}

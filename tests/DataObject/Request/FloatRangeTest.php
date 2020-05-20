<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Request;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\FloatRange;

class FloatRangeTest extends TestCase
{
    public function testBothValuesSet()
    {
        $lte = (float)rand() / (float)getrandmax();
        $gte = (float)rand() / (float)getrandmax();

        $range = new FloatRange($lte, $gte);
        $this->assertEquals($lte, $range->getLte());
        $this->assertEquals($gte, $range->getGte());
        $data = [
            'lte' => $lte,
            'gte' => $gte,
        ];
        $this->assertSame($data, $range->toArray());
    }

    public function testOnlyLte()
    {
        $lte = (float)rand() / (float)getrandmax();
        $range = new FloatRange($lte);
        $this->assertEquals($lte, $range->getLte());
        $this->assertNull($range->getGte());
        $data = [
            'lte' => $lte,
        ];
        $this->assertSame($data, $range->toArray());
    }

    public function testOnlyGte()
    {
        $gte = (float)rand() / (float)getrandmax();
        $range = new FloatRange(null, $gte);
        $this->assertEquals($gte, $range->getGte());
        $this->assertNull($range->getLte());
        $data = [
            'gte' => $gte,
        ];
        $this->assertSame($data, $range->toArray());
    }
}

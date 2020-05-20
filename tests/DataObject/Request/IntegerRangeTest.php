<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Request;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Request\IntegerRange;

class IntegerRangeTest extends TestCase
{
    public function testBothValuesSet()
    {
        $lte = rand(1, 100);
        $gte = rand(1, 100);

        $range = new IntegerRange($lte, $gte);
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
        $lte = rand(1, 100);
        $range = new IntegerRange($lte);
        $this->assertEquals($lte, $range->getLte());
        $this->assertNull($range->getGte());
        $data = [
            'lte' => $lte,
        ];
        $this->assertSame($data, $range->toArray());
    }

    public function testOnlyGte()
    {
        $gte = rand(1, 100);
        $range = new IntegerRange(null, $gte);
        $this->assertEquals($gte, $range->getGte());
        $this->assertNull($range->getLte());
        $data = [
            'gte' => $gte,
        ];
        $this->assertSame($data, $range->toArray());
    }
}

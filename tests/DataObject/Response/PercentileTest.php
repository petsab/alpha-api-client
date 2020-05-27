<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Percentile;
use Teas\AlphaApiClient\DataObject\Response\Rating;

class PercentileTest extends TestCase
{
    public function testAll()
    {
        $val0 = (float)rand() / (float)getrandmax();
        $val10 = (float)rand() / (float)getrandmax();
        $val20 = (float)rand() / (float)getrandmax();
        $val30 = (float)rand() / (float)getrandmax();
        $val40 = (float)rand() / (float)getrandmax();
        $val50 = (float)rand() / (float)getrandmax();
        $val60 = (float)rand() / (float)getrandmax();
        $val70 = (float)rand() / (float)getrandmax();
        $val80 = (float)rand() / (float)getrandmax();
        $val90 = (float)rand() / (float)getrandmax();
        $val100 = (float)rand() / (float)getrandmax();
        $percentile = new Percentile();
        $percentile->setValue0($val0);
        $percentile->setValue10($val10);
        $percentile->setValue20($val20);
        $percentile->setValue30($val30);
        $percentile->setValue40($val40);
        $percentile->setValue50($val50);
        $percentile->setValue60($val60);
        $percentile->setValue70($val70);
        $percentile->setValue80($val80);
        $percentile->setValue90($val90);
        $percentile->setValue100($val100);

        $this->assertEquals($val0, $percentile->getValue0());
        $this->assertEquals($val10, $percentile->getValue10());
        $this->assertEquals($val20, $percentile->getValue20());
        $this->assertEquals($val30, $percentile->getValue30());
        $this->assertEquals($val40, $percentile->getValue40());
        $this->assertEquals($val50, $percentile->getValue50());
        $this->assertEquals($val60, $percentile->getValue60());
        $this->assertEquals($val70, $percentile->getValue70());
        $this->assertEquals($val80, $percentile->getValue80());
        $this->assertEquals($val90, $percentile->getValue90());
        $this->assertEquals($val100, $percentile->getValue100());
        $data = [
            'value0' => $val0,
            'value10' => $val10,
            'value20' => $val20,
            'value30' => $val30,
            'value40' => $val40,
            'value50' => $val50,
            'value60' => $val60,
            'value70' => $val70,
            'value80' => $val80,
            'value90' => $val90,
            'value100' => $val100,
        ];
        $this->assertSame($data, $percentile->toArray());
    }
}

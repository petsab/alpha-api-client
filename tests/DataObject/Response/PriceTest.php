<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Price;

class PriceTest extends TestCase
{
    public function testAll()
    {
        $change = (float) rand(1, 100);
        $withVat = rand(1, 100);
        $vatRate = rand(1, 100);
        $currency = uniqid();
        $originalCurrency = uniqid();
        $originalWithVat = rand(1, 100);
        $vatReclaimable = rand(1, 10) > 5;
        $price = new Price($withVat, $currency, $originalWithVat, $originalCurrency);
        $price->setChange($change);
        $price->setVatReclaimable($vatReclaimable);
        $price->setVatRate($vatRate);
        $this->assertSame($change, $price->getChange());
        $this->assertSame($withVat, $price->getWithVat());
        $data = [
            'change' => $price->getChange(),
            'withVat' => $price->getWithVat(),
            'vatRate' => $price->getVatRate(),
            'vatReclaimable' => $price->isVatReclaimable(),
            'currency' => $price->getCurrency(),
            'originalCurrency' => $price->getOriginalCurrency(),
            'originalWithVat' => $price->getOriginalWithVat(),
        ];
        $this->assertEquals($data, $price->toArray());
    }
}

<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\Traits;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\Traits\NullableDateTimeTrait;

class NullableDateTimeTraitTest extends TestCase
{
    use NullableDateTimeTrait;

    public function testNullDateTimeToString()
    {
        $result = $this->nullableDateTimeToString(null, DATE_ATOM);
        $this->assertNull($result);
    }

    public function testDateTimeToString()
    {
        $date = new \DateTime();
        $result = $this->nullableDateTimeToString($date, DATE_ATOM);
        $this->assertSame($result, $date->format(DATE_ATOM));
    }

    public function testStringToDateTime()
    {
        $date = new \DateTimeImmutable();
        $result = $this->stringToDateTime($date->format('Y-m-d H:i:s.u'));
        $this->assertEquals($date, $result);
    }

    public function testNullToDateTime()
    {
        $result = $this->stringToDateTime(null);
        $this->assertNull($result);
    }

    public function testIncorrectDateStringToDateTime()
    {
        $result = $this->stringToDateTime(uniqid());
        $this->assertNull($result);
    }
}

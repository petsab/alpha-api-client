<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Rating;

class RatingTest extends TestCase
{
    public function testAll()
    {
        $average = rand(1, 10);
        $count = rand(1, 10);
        $rating = new Rating($average, $count);
        $this->assertSame($average, $rating->getAverage());
        $this->assertSame($count, $rating->getCount());
        $data = [
            'average' => $average,
            'count' => $count,
        ];
        $this->assertSame($data, $rating->toArray());
    }
}

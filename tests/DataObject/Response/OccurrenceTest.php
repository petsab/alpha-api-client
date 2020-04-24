<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Occurrence;

class OccurrenceTest extends TestCase
{
    public function testAll()
    {
        $first = new DateTimeImmutable();
        $last  = new DateTimeImmutable();
        $data = [
            'first' => $first->format('Y-m-d'),
            'last' => $last->format('Y-m-d'),
        ];
        $occurrence = new Occurrence($first, $last);
        $this->assertSame($first, $occurrence->getFirst());
        $this->assertSame($last, $occurrence->getLast());
        $this->assertSame($data, $occurrence->toArray());

        $occurrence = new Occurrence(null, $last);
        $this->assertNull($occurrence->getFirst());
        $data = [
            'first' => null,
            'last' => $last->format('Y-m-d'),
        ];
        $this->assertSame($data, $occurrence->toArray());
    }
}

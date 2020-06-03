<?php

declare(strict_types=1);

namespace TeasTest\AlphaApiClient\DataObject\Response;

use PHPUnit\Framework\TestCase;
use Teas\AlphaApiClient\DataObject\Response\Rating;
use Teas\AlphaApiClient\DataObject\Response\Similarity;

class SimilarityTest extends TestCase
{
    public function testAll()
    {
        $level = rand(1, 10);
        $score = (float)rand() / (float)getrandmax();
        $similarity = new Similarity($level, $score);
        $data = [
            'level' => $similarity->getLevel(),
            'score' => $similarity->getScore(),
        ];
        $this->assertSame($data, $similarity->toArray());
    }
}

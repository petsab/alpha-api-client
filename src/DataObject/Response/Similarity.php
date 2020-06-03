<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class Similarity implements DataObjectInterface
{
    /**
     * @var int|null
     */
    private $level;

    /**
     * @var float|null
     */
    private $score;

    /**
     * @param int|null $level
     * @param float|null $score
     */
    public function __construct(?int $level, ?float $score)
    {
        $this->level = $level;
        $this->score = $score;
    }

    /**
     * @return int|null
     */
    public function getLevel(): ?int
    {
        return $this->level;
    }

    /**
     * @return float|null
     */
    public function getScore(): ?float
    {
        return $this->score;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'level' => $this->level,
            'score' => $this->score,
        ];
    }
}

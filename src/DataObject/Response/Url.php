<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class Url implements DataObjectInterface
{
    /**
     * @var string
     */
    private $full;

    /**
     * @param string $full
     */
    public function __construct(string $full)
    {
        $this->full = $full;
    }

    /**
     * @return string
     */
    public function getFull(): string
    {
        return $this->full;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'full' => $this->full,
        ];
    }
}

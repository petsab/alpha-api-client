<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class Url implements DataObjectInterface
{
    /**
     * @var string|null
     */
    private $full;

    /**
     * @param string|null $full
     */
    public function __construct(?string $full)
    {
        $this->full = $full;
    }

    /**
     * @return string|null
     */
    public function getFull(): ?string
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

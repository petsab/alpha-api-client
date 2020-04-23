<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use DateTimeImmutable;
use Teas\AlphaApiClient\DataObject\DataObjectInterface;
use Teas\AlphaApiClient\Traits\NullableDateTimeTrait;

class Occurrence implements DataObjectInterface
{
    use NullableDateTimeTrait;

    /**
     * @var DateTimeImmutable|null
     */
    private $first;

    /**
     * @var DateTimeImmutable|null
     */
    private $last;

    /**
     * Occurrence constructor.
     * @param DateTimeImmutable|null $first
     * @param DateTimeImmutable|null $last
     */
    public function __construct(?DateTimeImmutable $first, ?DateTimeImmutable $last)
    {
        $this->first = $first;
        $this->last = $last;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getFirst(): ?DateTimeImmutable
    {
        return $this->first;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getLast(): ?DateTimeImmutable
    {
        return $this->last;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'first' => $this->nullableDateTimeToString($this->first, 'Y-m-d'),
            'last' => $this->nullableDateTimeToString($this->last, 'Y-m-d'),
        ];
    }
}

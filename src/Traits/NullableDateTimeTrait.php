<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Traits;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;

trait NullableDateTimeTrait
{
    /**
     * @param DateTimeInterface|null $date
     * @param string $format
     * @return string|null
     */
    public function nullableDateTimeToString(DateTimeInterface $date = null, $format = \DateTime::ATOM)
    {
        if (null === $date) {
            return null;
        }

        return $date->format($format);
    }

    /**
     * @param string|null $date
     * @return DateTimeImmutable
     */
    public function stringToDateTime(?string $date): ?DateTimeImmutable
    {
        if (null === $date) {
            return null;
        }

        try {
            $date = new DateTimeImmutable($date);
        } catch (Exception $ex) {
            $date = null;
        }

        return $date;
    }
}

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Enum;

final class AggregationLevel
{
    public const LEVEL_MAKE = 'make';
    public const LEVEL_MODEL = 'model';
    public const LEVEL_TRANSMISSION = 'transmission';
    public const LEVEL_FUEL_TYPE = 'fuel_type';
    public const LEVEL_DRIVE = 'drive';
    public const LEVEL_YEAR = 'year';
    public const LEVEL_REGION = 'region';
    public const LEVEL_AVAILABLE = [
        self::LEVEL_MAKE,
        self::LEVEL_MODEL,
        self::LEVEL_TRANSMISSION,
        self::LEVEL_FUEL_TYPE,
        self::LEVEL_DRIVE,
        self::LEVEL_YEAR,
        self::LEVEL_REGION,
    ];
}

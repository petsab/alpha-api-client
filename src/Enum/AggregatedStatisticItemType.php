<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\Enum;

final class AggregatedStatisticItemType
{
    public const TYPE_SOLD = 'sold';
    public const TYPE_STOCK = 'stock';
    public const TYPES_AVAILABLE = [
        self::TYPE_SOLD,
        self::TYPE_STOCK,
    ];
}

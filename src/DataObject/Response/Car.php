<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

class Car extends BaseCar
{
    /**
     * @var bool
     */
    private $available;

    /**
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->available;
    }

    /**
     * @param bool $available
     * @return Car
     */
    public function setAvailable(bool $available): Car
    {
        $this->available = $available;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $data = parent::toArray();
        $data['available'] = $this->isAvailable();

        return $data;
    }
}

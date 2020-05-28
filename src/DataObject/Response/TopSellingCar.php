<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class TopSellingCar implements DataObjectInterface
{
    /**
     * @var int|null
     */
    private $count;

    /**
     * @var string|null
     */
    private $make;

    /**
     * @var string|null
     */
    private $model;

    /**
     * @param int|null $count
     * @param string|null $make
     * @param string|null $model
     */
    public function __construct(?int $count, ?string $make, ?string $model)
    {
        $this->count = $count;
        $this->make = $make;
        $this->model = $model;
    }

    /**
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @return string|null
     */
    public function getMake(): ?string
    {
        return $this->make;
    }

    /**
     * @return string|null
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'count' => $this->count,
            'make' => $this->make,
            'model' => $this->model,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Request;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class FilterCar implements DataObjectInterface
{
    /**
     * @var string|null
     */
    private $make;

    /**
     * @var string|null
     */
    private $model;

    /**
     * @var int|null
     */
    private $year;

    /**
     * @param string|null $make
     * @param string|null $model
     * @param int|null $year
     */
    public function __construct(?string $make = null, ?string $model = null, ?int $year = null)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
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
     * @return int|null
     */
    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $data = [];
        if (!empty($this->make)) {
            $data['make'] = $this->make;
        }
        if (!empty($this->model)) {
            $data['model'] = $this->model;
        }
        if (!empty($this->year)) {
            $data['year'] = $this->year;
        }

        return $data;
    }
}

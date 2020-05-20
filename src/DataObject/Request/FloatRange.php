<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Request;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class FloatRange implements DataObjectInterface
{
    /**
     * @var float|null
     */
    private $lte;

    /**
     * @var float|null
     */
    private $gte;

    /**
     * @param float|null $lte
     * @param float|null $gte
     */
    public function __construct(?float $lte = null, ?float $gte = null)
    {
        $this->lte = $lte;
        $this->gte = $gte;
    }

    /**
     * @return float|null
     */
    public function getLte(): ?float
    {
        return $this->lte;
    }

    /**
     * @return float|null
     */
    public function getGte(): ?float
    {
        return $this->gte;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $data = [];
        if (!empty($this->lte)) {
            $data['lte'] = $this->lte;
        }
        if (!empty($this->gte)) {
            $data['gte'] = $this->gte;
        }

        return $data;
    }
}

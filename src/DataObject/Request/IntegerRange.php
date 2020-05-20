<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Request;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class IntegerRange implements DataObjectInterface
{
    /**
     * @var int|null
     */
    private $lte;

    /**
     * @var int|null
     */
    private $gte;

    /**
     * @param int|null $lte
     * @param int|null $gte
     */
    public function __construct(?int $lte = null, ?int $gte = null)
    {
        $this->lte = $lte;
        $this->gte = $gte;
    }

    /**
     * @return int|null
     */
    public function getLte(): ?int
    {
        return $this->lte;
    }

    /**
     * @return int|null
     */
    public function getGte(): ?int
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

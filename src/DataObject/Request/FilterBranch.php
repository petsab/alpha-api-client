<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Request;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class FilterBranch implements DataObjectInterface
{
    /**
     * @var string|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $zip;

    /**
     * @param string|null $address
     * @param string|null $zip
     */
    public function __construct(?string $address = null, ?string $zip = null)
    {
        $this->address = $address;
        $this->zip = $zip;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @return string|null
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $data = [];
        if (!empty($this->address)) {
            $data['address'] = $this->address;
        }
        if (!empty($this->zip)) {
            $data['zip'] = $this->zip;
        }

        return $data;
    }
}

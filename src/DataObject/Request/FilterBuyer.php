<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Request;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class FilterBuyer implements DataObjectInterface
{
    /**
     * @var string
     */
    private $country;

    /**
     * @var FilterBranch|null
     */
    private $branch;

    /**
     * @param string $country
     * @param FilterBranch|null $branch
     */
    public function __construct(string $country, ?FilterBranch $branch = null)
    {
        $this->country = $country;
        $this->branch = $branch;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return FilterBranch|null
     */
    public function getBranch(): ?FilterBranch
    {
        return $this->branch;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $data = [
            'country' => $this->country,
        ];
        if (!empty($this->branch)) {
            $data['branch'] = $this->branch->toArray();
        }

        return $data;
    }
}

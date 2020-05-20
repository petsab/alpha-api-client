<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Request;

use Teas\AlphaApiClient\DataObject\DataObjectInterface;

class FilterSeller implements DataObjectInterface
{
    /**
     * @var array<string>
     */
    private $country = [];

    /**
     * @var string|null
     */
    private $server;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var float|null
     */
    private $ranking;

    /**
     * @param array<string> $country
     * @param string|null $server
     * @param string|null $type
     * @param float|null $ranking
     */
    public function __construct(array $country, ?string $server = null, ?string $type = null, ?float $ranking = null)
    {
        $this->country = $country;
        $this->server = $server;
        $this->type = $type;
        $this->ranking = $ranking;
    }

    /**
     * @return array<string>
     */
    public function getCountry(): array
    {
        return $this->country;
    }

    /**
     * @return string|null
     */
    public function getServer(): ?string
    {
        return $this->server;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return float|null
     */
    public function getRanking(): ?float
    {
        return $this->ranking;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $data = [
            'country' => $this->country,
        ];
        if (!empty($this->server)) {
            $data['server'] = $this->server;
        }
        if (!empty($this->type)) {
            $data['type'] = $this->type;
        }
        if (!empty($this->ranking)) {
            $data['ranking'] = $this->ranking;
        }

        return $data;
    }
}

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Request;

/**
 * @SuppressWarnings(PHPMD.TooManyFields)
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
class AvailableCarsFilter extends AbstractCarsFilter
{
    /**
     * @var FilterBuyer
     */
    private $buyer;

    /**
     * @var IntegerRange|null
     */
    private $margin;

    /**
     * @var FloatRange|null
     */
    private $position;

    /**
     * @var IntegerRange|null
     */
    private $turnover;

    /**
     * @var IntegerRange|null
     */
    private $uniformity;

    /**
     * @param FilterSeller $seller
     * @param FilterBuyer $buyer
     */
    public function __construct(FilterSeller $seller, FilterBuyer $buyer)
    {
        parent::__construct($seller);
        $this->buyer = $buyer;
    }

    /**
     * @param IntegerRange|null $margin
     */
    public function setMargin(?IntegerRange $margin): void
    {
        $this->margin = $margin;
    }

    /**
     * @param FloatRange|null $position
     */
    public function setPosition(?FloatRange $position): void
    {
        $this->position = $position;
    }

    /**
     * @param IntegerRange|null $turnover
     */
    public function setTurnover(?IntegerRange $turnover): void
    {
        $this->turnover = $turnover;
    }

    /**
     * @param IntegerRange|null $uniformity
     */
    public function setUniformity(?IntegerRange $uniformity): void
    {
        $this->uniformity = $uniformity;
    }

    /**
     * @return FilterBuyer
     */
    public function getBuyer(): FilterBuyer
    {
        return $this->buyer;
    }

    /**
     * @return IntegerRange|null
     */
    public function getMargin(): ?IntegerRange
    {
        return $this->margin;
    }

    /**
     * @return FloatRange|null
     */
    public function getPosition(): ?FloatRange
    {
        return $this->position;
    }

    /**
     * @return IntegerRange|null
     */
    public function getTurnover(): ?IntegerRange
    {
        return $this->turnover;
    }

    /**
     * @return IntegerRange|null
     */
    public function getUniformity(): ?IntegerRange
    {
        return $this->uniformity;
    }

    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function toArray(): array
    {
        $data = parent::toArray();
        if (!empty($this->buyer)) {
            $data['buyer'] = $this->buyer->toArray();
        }
        if (!empty($this->margin)) {
            $data['margin'] = $this->margin->toArray();
        }
        if (!empty($this->position)) {
            $data['position'] = $this->position->toArray();
        }
        if (!empty($this->turnover)) {
            $data['turnover'] = $this->turnover->toArray();
        }
        if (!empty($this->uniformity)) {
            $data['uniformity'] = $this->uniformity->toArray();
        }

        return $data;
    }
}

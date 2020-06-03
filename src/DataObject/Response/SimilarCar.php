<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\DataObject\Response;

class SimilarCar extends AbstractBaseCar
{
    /**
     * @var Similarity
     */
    private $similarity;

    /**
     * @return Similarity
     */
    public function getSimilarity(): Similarity
    {
        return $this->similarity;
    }

    /**
     * @param Similarity $similarity
     * @return SimilarCar
     */
    public function setSimilarity(Similarity $similarity): SimilarCar
    {
        $this->similarity = $similarity;

        return $this;
    }

    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        $data = parent::toArray();
        $data['similarity'] = $this->similarity->toArray();

        return $data;
    }
}

<?php

declare(strict_types=1);

namespace Teas\AlphaApiClient\ResponseMapper;

use Teas\AlphaApiClient\DataObject\Response\SimilarCar;
use Teas\AlphaApiClient\DataObject\Response\Similarity;

class SimilarCarResponseMapper extends BaseCarResponseMapper
{
    /**
     * @param array<mixed> $data
     * @return SimilarCar
     */
    public function map(array $data): SimilarCar
    {
        $similarCar = $this->carDOFactory->createSimilarCar($data['PK']);
        $this->fillBaseCarData($data, $similarCar);
        $similarCar->setSimilarity($this->mapSimilarity($data));

        return $similarCar;
    }

    /**
     * @param array<mixed> $data
     * @return Similarity
     */
    private function mapSimilarity(array $data): Similarity
    {
        return $this->carDOFactory->createSimilarity(
            $data['similarity_level'],
            $data['similarity_score']
        );
    }
}

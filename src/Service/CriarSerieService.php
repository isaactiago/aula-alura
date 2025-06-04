<?php

namespace App\Service;

use App\DTO\CriarSerieDTO;
use App\Entity\Series;
use App\Repository\SeriesRepository;

class CriarSerieService
{
    public function __construct(
        private SeriesRepository $seriesRepository
    ){
    }

    public function execute(CriarSerieDTO $dto): Series
    {
        $seri = new Series($dto->getNome());
        return $this->seriesRepository->salvar($seri);
        
    }
}
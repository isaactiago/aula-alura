<?php

namespace App\Service;

use App\Entity\Series;
use App\Repository\SeriesRepository;
use Exception;
use Throwable;

class BuscarSerieOuFalharService
{
    public function __construct(
        public readonly SeriesRepository $seriesRepository,
    )
    {
    }
    public function BuscarSerieOuFalhar(Series $series):Series
    {
        return $this->seriesRepository->find($series) ?? new Exception("Serie nao encontrada");
    }
}
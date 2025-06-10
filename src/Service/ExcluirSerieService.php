<?php

namespace App\Service;

use App\Entity\Series;
use App\Repository\SeriesRepository;
use Exception;

class ExcluirSerieService
{
    public function __construct(
        public readonly BuscarSerieOuFalharService $buscarSerieOuFalharService,
        public readonly SeriesRepository $seriesRepository,
    )
    {
    }

    public function execute(Series $series): void
    {
        $temporadas = $series->getTemporadas();

        if($temporadas === null){
            new Exception('temporadas nao ecnontradas');
        }

        foreach ($temporadas as $temporada){
            $series->removeTemporada($temporada);

            $epidodios = $temporada->getEpisodeos();

            if($epidodios === null){
                new Exception('episodios nao ecnontrados');
            }

            foreach ($epidodios as $epidodio){
                $temporada->removeEpisodeo($epidodio);
            }
        }

       $this->seriesRepository->remove(serie: $series);
    }
}
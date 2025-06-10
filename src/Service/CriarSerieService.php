<?php

namespace App\Service;

use App\DTO\CriarSerieDTO;
use App\Entity\Episodio;
use App\Entity\Series;
use App\Entity\Temporada;
use App\Repository\SeriesRepository;

class CriarSerieService
{
    public function __construct(
        private SeriesRepository $seriesRepository
    ){
    }

    public function execute(CriarSerieDTO $dto): Series
    {
        $serie = new Series($dto->nome);

        for($temporadaContador = 1; $temporadaContador <= $dto->temporada; $temporadaContador++){
            $temporada  = new Temporada($temporadaContador);

            $serie->addTemporada($temporada);
      
            for($episodiosContador = 1; $episodiosContador <= $dto->episodios; $episodiosContador++){
                $episodio = new Episodio($episodiosContador);
                $temporada->addEpisodeo($episodio);
            }
            
        }
       return $this->seriesRepository->salvar($serie);
    }
}
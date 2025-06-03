<?php

namespace App\Service;

use Psr\Cache\CacheItemInterface;
use App\Repository\SeriesRepository;
use Psr\Cache\CacheItemPoolInterface;

class BuscarTemporadasEpisodiosSeriesService
{
    public function __construct(
        private SeriesRepository $seriesRepository,
        private CacheItemPoolInterface $cache,
        
    )
    {
    }

    public function execute(): array
    {
        $series =  $this->cache->getItem('buscar');

        //se existe no cahce eu retorno o cahe 
        if($series->isHit()){
            return $series->get();
        }
        //senao eu busco os dados e salvo no cahce
        $dados = $this->seriesRepository->buscarTemporadasEepsodiosPorSerie();
        $series->set($dados);
        $this->cache->save($series);
            
        return $dados;
    }
}

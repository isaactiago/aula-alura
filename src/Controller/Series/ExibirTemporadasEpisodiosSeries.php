<?php

namespace App\Controller\Series;

use DateInterval;
use App\Repository\SeriesRepository;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\BuscarTemporadasEpisodiosSeriesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExibirTemporadasEpisodiosSeries extends AbstractController
{
    public function __construct(
        private SeriesRepository $seriesRepository,
        private CacheInterface $cache
    )
    {
    }

    #[Route(path:'buscar')]
    public function __invoke(BuscarTemporadasEpisodiosSeriesService $buscar): Response
    {
        $series = $buscar->execute();
        return $this->render('series/buscar.html.twig',[
            'data' => $series
        ]);
    }
}
    
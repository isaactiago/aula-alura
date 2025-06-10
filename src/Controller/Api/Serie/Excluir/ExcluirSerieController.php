<?php

namespace App\Controller\Api\Serie\Excluir;

use App\Controller\DefaultController;
use App\Entity\Series;
use App\Repository\SeriesRepository;
use App\Service\BuscarSerieOuFalharService;
use App\Service\ExcluirSerieService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path:'api/v1/excluir/{series}', methods:['DELETE'])]
class ExcluirSerieController extends DefaultController
{
    public function __invoke(Series $series, ExcluirSerieService $excluir,BuscarSerieOuFalharService $b): JsonResponse
    {
        try {
          
            $excluir->execute(series: $series);
            return $this->toJsonResponse(Response::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->toJsonResponseException($th);
        }
    }
}
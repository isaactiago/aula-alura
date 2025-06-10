<?php

namespace App\Controller\Api\Serie\Criar;

use App\Controller\DefaultController;
use App\DTO\CriarSerieDTO;
use App\Repository\SeriesRepository;
use App\Service\CriarSerieService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;
use Webmozart\Assert\Assert as AssertAssert;

#[Route(path:'/api/v1/criar',methods:['POST'])]
class CriarSerieComTemporadaSeriesController extends DefaultController
{
    public function __invoke(
        Request $request,
        CriarSerieService $service,
        #[MapRequestPayload()] CriarSerieDTO $dto,//com isso eu nao preciso fazer um new no dto
    ): JsonResponse
    {
        /* $dados = json_decode($request->getContent(),true);
        $dto = new CriarSerieDTO(
            nome: $dados['nome'],
            temporada: $dados['temporada'],
            episodios: $dados['episdodeos']
        ); */

        try{
            //AssertAssert::notEmpty($dados,'Dados vazios');

            $service->execute(dto: $dto);

            return $this->toJsonResponse();

        }catch (Throwable $e) {
            return $this->toJsonResponseException($e);
        }
    }
}
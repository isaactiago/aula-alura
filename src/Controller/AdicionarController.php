<?php

namespace App\Controller;

use App\Entity\Series;
use App\Form\SeriesForm;
use App\Repository\SeriesRepository;
use App\DTO\SeriesCriadasParaInputDTO;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path:"series/adicionar", name:"add", methods:['POST'])]
class AdicionarController extends AbstractController
{
    public function __construct(
        private readonly SeriesRepository $series,
    )
    {
    }
    
    public function __invoke(Request $request): Response
    {
       
        $input = new SeriesCriadasParaInputDTO();
        $seriesform = $this->createForm(Series::class,$input)->handleRequest($request);

        if(!$seriesform->isValid()){
            return $this->render('series/form.html.twig',['form' => $input]);
        }

        $serie = new Series($input->nomeSerie);
        for($i = 0; $i < $input->quantidadeDeTemporadas; $i++){
            
        }

        $this->series->salvar($input);
        
        $session = $request->getSession();
        $session->set("sucess","adcionado ocm sucersso");
        return $this->redirectToRoute('app_series');
        
    }
}

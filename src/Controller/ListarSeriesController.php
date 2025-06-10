<?php

namespace App\Controller;

use App\Repository\SeriesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path:'/series', name: 'app_series', methods:["GET"])]
class ListarSeriesController extends AbstractController 
{

    public function __construct(
        public readonly SeriesRepository $series
    )
    {
    }
    
    public function __invoke(Request $request): Response
    {
        
      $session = $request->getSession();
      $mensage = $session->get("sucess");
      $session->remove("sucess");
     
        return $this->render('series/index.html.twig', [
            'controller_name' => 'SeriesController',
            "data" => $this->series->findAll(),
            "sucessMensage" =>  $mensage
        ]);
    }
}

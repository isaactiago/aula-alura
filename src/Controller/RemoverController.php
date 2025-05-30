<?php

namespace App\Controller;

use App\Entity\Series;
use App\Repository\SeriesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path:"/series/deleta/{id}",name:"remove",methods:['POST'])]
class RemoverController extends AbstractController
{

    public function __invoke(int $id,SeriesRepository $serieS,Request $request): Response
    {
        $s = $serieS->find($id);
        $serieS->remove($s);
        
        $session = $request->getSession();
        $session->set("sucess","deletado com sucesso");
        return $this->redirectToRoute("app_series");   
    }
}

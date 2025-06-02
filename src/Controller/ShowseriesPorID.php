<?php

namespace App\Controller;

use App\Repository\TemporadaRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShowseriesPorID extends AbstractController
{
    #[Route(path:'/{id}/temporadas')]
    public function index(int $id,TemporadaRepository $temporada): Response
    {
        return $this->render('/series/mostrar.html.twig',[
            'teste' => $temporada->findBy(['id' => $id])
        ]);
    }
}
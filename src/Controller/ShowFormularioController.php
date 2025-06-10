<?php

namespace App\Controller;

use App\Form\SeriesForm;
use App\DTO\SeriesCriadasParaInputDTO;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path:"showForm", name:"show_form", methods:['GET'])]
class ShowFormularioController extends AbstractController
{
    public function __invoke(): Response
    {
        $form = $this->createForm(SeriesForm::class,new SeriesCriadasParaInputDTO(),[
            'action' => $this->generateUrl('add'),
            'method' => 'POST'
        ]);
        
        return $this->render('series/form.html.twig',['form' => $form]);
    } 
}

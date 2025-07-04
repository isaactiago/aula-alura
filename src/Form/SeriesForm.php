<?php

namespace App\Form;

use App\DTO\SeriesCriadasParaInputDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SeriesForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomeSerie')
            ->add("quantidadeDeTemporadas",NumberType::class , options:['label' => 'qtd Temoradas:'])
             ->add("epsodiosPorTemporada",NumberType::class ,options:['label' => 'Ep por temporada:'])
            ->add('salva', SubmitType::class,['label' => 'salvar'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SeriesCriadasParaInputDTO::class
        ]);
    }
}

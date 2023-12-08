<?php
// src/Form/QuestionnaireType.php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionnaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question1', RadioType::class, [
                'choices' => [
                    'A' => 'Dioxyde de carbone (CO2)',
                    'B' => 'Méthane (CH4)',
                    'C' => 'Oxyde nitreux (N2O)',
                    'D' => 'Hexafluorure de soufre (SF6)',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
        ]);
    }
}

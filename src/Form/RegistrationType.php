<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Constraints as Assert;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50',
                ],
                'label' => 'Nom / Prénom',
                'label_attr' => [
                    'class' => 'form_label'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 2, 'max' => 50])
                ]


            ])
            ->add('password')
            ->add('email', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '180',
                ],
                'label' => 'Adresse email',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Email(),
                    new Assert\Length(['min' => 2, 'max' => 180])
                ]
            ])

            ->add('submit', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

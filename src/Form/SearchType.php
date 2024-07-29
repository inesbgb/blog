<?php

namespace App\Form;

use App\DTO\SearchData;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('query', TextType::class, [
                'attr' => [
                    'class' => 'form-control mt-2',
                    'placeholder' => 'Rechercher un post'
                ],
                'required' => false,
                'label' => false,
            ])

            ->add('categories', EntityType::class, [
                'class' => Categories::class,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => true,
                'required' => false,
            ])

            ->add('envoyer', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-2'
                ],
                'label' => 'Rechercher',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => SearchData::class,
            "method" => 'GET',
            "csrf_protectio" => false 

        ]);
    }
}

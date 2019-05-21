<?php

namespace App\Form;

use App\Entity\SessionFormation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionFormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginAt')
            ->add('endAt')
            ->add('title')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('formation')
            ->add('formateurs')
            ->add('participants')
            ->add('parentsFacilitateurs')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SessionFormation::class,
        ]);
    }
}

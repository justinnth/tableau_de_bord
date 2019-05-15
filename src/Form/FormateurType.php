<?php

namespace App\Form;

use App\Entity\Formateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_de_naissance')
            ->add('mail')
            ->add('telephone')
            ->add('meilleur_diplome')
            ->add('salarie')
            ->add('fonction_actuelle')
            ->add('domaine_expertise')
            ->add('mode_acquisition')
            ->add('type_formations')
            ->add('zone_execution')
            ->add('formation_iperia')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('formations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formateur::class,
        ]);
    }
}

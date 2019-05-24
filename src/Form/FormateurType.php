<?php

namespace App\Form;

use App\Entity\Formateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
            ->add('type_formations', CollectionType::class)
            ->add('zone_execution', CollectionType::class, [
                'entry_type' => NumberType::class
            ])
            ->add('formation_iperia', CollectionType::class, [
                'entry_type' => NumberType::class
            ])
            ->add('createdAt')
            ->add('updatedAt')
            ->add('formations')
            ->add('sessionFormations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formateur::class,
        ]);
    }
}

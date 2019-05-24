<?php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('duree')
            ->add('reference')
            ->add('pedagogie')
            ->add('publicVise')
            ->add('prerequis')
            ->add('lieu')
            ->add('cpf')
            ->add('photo')
            ->add('lien')
            ->add('facebook')
            ->add('trameARealiser')
            ->add('trameValiderIperia')
            ->add('numero_cpf')
            ->add('theme')
            ->add('descriptif')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('formateurs')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\SessionFormation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionFormationType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginAt', DateTimeType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'datetimepicker-input', 'data-target' => '#datetimepicker1'],
                'html5' => false
            ])
            ->add('endAt', DateTimeType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'datetimepicker-input', 'data-target' => '#datetimepicker1'],
                'html5' => false
            ])
            ->add('title')
            ->add('formation')
            ->add('formateurs')
            ->add('participants')
            ->add('parentsFacilitateurs');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SessionFormation::class,
        ]);
    }
}

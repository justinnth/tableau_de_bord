<?php

namespace App\Form;

use App\Entity\Formateur;
use App\Entity\Formation;
use App\Entity\SessionFormation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
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
            ->add('beginAt')
            ->add('endAt')
            ->add('title');

        $builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'));
        $builder->addEventListener(FormEvents::PRE_SUBMIT, array($this, 'onPreSubmit'));
    }

    protected function addElements(FormInterface $form, Formation $formation = null)
    {
        $form->add('formation', EntityType::class, array(
            'required' => true,
            'data' => $formation,
            'placeholder' => 'Choisir une formation...',
            'class' => Formation::class
        ));

        $formateurs = array();

        if ($formation){
            $formateursRepository = $this->em->getRepository(Formateur::class);

            $formateurs = $formateursRepository->createQueryBuilder('formateurs')
                ->leftJoin('formateurs_formations', 'ff')
                ->where('ff.formation_id = :formation');
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SessionFormation::class,
        ]);
    }
}

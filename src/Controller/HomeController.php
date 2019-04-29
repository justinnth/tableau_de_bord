<?php


namespace App\Controller;



use App\Entity\Formateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('tableau_de_bord.html.twig');
    }

    /**
     * @Route("/formateurs/{id}", name="app_formateurs")
     */
    public function formateur($id, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Formateur::class);

        if ($id == 'all')
            $formateur = $repository->findAll();
        else{
            /** @var Formateur $formateur */
            $formateur = $repository->findOneBy(['id' => $id]);
        }

        if (!$formateur)
            throw $this->createNotFoundException(sprintf("Aucun formateur pour l'id : %s", $id));

        return $this->render('formateurs/formateurs.html.twig', [
            'formateurs' => $formateur
        ]);
    }
}
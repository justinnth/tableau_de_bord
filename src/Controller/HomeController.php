<?php


namespace App\Controller;



use App\Entity\Formateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends BaseController
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
    public function formateur($id, EntityManagerInterface $em, Request $request)
    {
        $repository = $em->getRepository(Formateur::class);

        if ($id == 'all'){
            $formateur = $repository->findAll();
            if($request->isMethod('POST')){
                $nom=$request->get('nom');
                $formateur=$repository->findBy(array("nom"=>$nom));
            }
        }
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
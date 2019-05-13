<?php


namespace App\Controller;



use App\Entity\Formateur;
use App\Entity\Formation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @param $id
     * @param EntityManagerInterface $em
     * @param Request $request
     * @return Response
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

    /**
     * @Route("/formations/{id}", name="app_formations")
     * @param $id
     * @param EntityManagerInterface $em
     * @param Request $request
     * @return Response
     */
    public function formation($id, EntityManagerInterface $em, Request $request)
    {
        $repository = $em->getRepository(Formation::class);

        if ($id == 'all'){
            $formation = $repository->findAll();
            if($request->isMethod('POST')){
                $nom=$request->get('formation');
                $formation=$repository->findBy(array("titre"=>$nom));
            }
        }
        else{
            /** @var Formation $formation */
            $formation = $repository->findOneBy(['id' => $id]);
        }

        if (!$formation)
            throw $this->createNotFoundException(sprintf("Aucune formation pour l'id : %s", $id));

        return $this->render('formations/formations.html.twig', [
            'formations' => $formation
        ]);
    }
}
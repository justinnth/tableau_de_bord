<?php


namespace App\Controller;



use App\Entity\ChercherFormation;
use App\Entity\Formateur;
use App\Entity\Formation;
use App\Form\ChercherFormationType;
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
        }
        else{
            /** @var Formation $formation */
            $formation = $repository->findOneBy(['id' => $id]);
        }

        if ($id == 'ThemeA'){
            $formation = $repository->findBy(
                ['theme' => 'a']
            );
        }elseif ($id == 'ThemeB'){
            $formation = $repository->findBy(
                ['theme' => 'b']
            );
        }elseif ($id == 'ThemeC'){
            $formation = $repository->findBy(
                ['theme' => 'c']
            );
        }elseif ($id == 'ThemeD'){
            $formation = $repository->findBy(
                ['theme' => 'd']
            );
        }elseif ($id == 'ThemeE'){
            $formation = $repository->findBy(
                ['theme' => 'e']
            );
        }elseif ($id == 'ThemeF'){
            $formation = $repository->findBy(
                ['theme' => 'f']
            );
        }

        if($request->isMethod('POST')){
            $nom=$request->get('formation');
            $formation=$repository->findBy(array("titre"=>$nom));
        }

        if (!$formation)
            throw $this->createNotFoundException(sprintf("Aucune formation pour l'id : %s", $id));

        return $this->render('formations/formations.html.twig', [
            'formations' => $formation
        ]);
    }


    /**
     * @Route(name="app_chercher")
     * @param $slug
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function trouverFormation($slug, EntityManagerInterface $em){

        $repository = $em->getRepository(Formation::class);

        if ($slug == '1'){
            $formation = $repository->findBy(
                ['titre' => 'Home']
             );
        }
        return $this->render('formations/formations.html.twig', [
            'formations' => $formation
        ]);

    }
}
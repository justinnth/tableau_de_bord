<?php


namespace App\Controller;



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
     * @Route("/formateurs", name="app_formateurs")
     */
    public function formateurs()
    {
        return $this->render('formateurs/formateurs.html.twig');
    }
}
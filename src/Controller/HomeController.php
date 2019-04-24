<?php


namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response("Page d'accueil");
    }

    /**
     * @Route("/formateurs")
     */
    public function formateurs()
    {
        return $this->render('formateurs/formateurs.html.twig');
    }
}
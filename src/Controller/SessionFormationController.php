<?php

namespace App\Controller;

use App\Entity\SessionFormation;
use App\Form\SessionFormationType;
use App\Repository\SessionFormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/session/formation")
 */
class SessionFormationController extends AbstractController
{
    /**
     * @Route("/", name="session_formation_index", methods={"GET"})
     */
    public function index(SessionFormationRepository $sessionFormationRepository): Response
    {
        return $this->render('session_formation/index.html.twig', [
            'session_formations' => $sessionFormationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="session_formation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sessionFormation = new SessionFormation();
        $form = $this->createForm(SessionFormationType::class, $sessionFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sessionFormation);
            $entityManager->flush();

            return $this->redirectToRoute('session_formation_index');
        }

        return $this->render('session_formation/new.html.twig', [
            'session_formation' => $sessionFormation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="session_formation_show", methods={"GET"})
     */
    public function show(SessionFormation $sessionFormation): Response
    {
        return $this->render('session_formation/show.html.twig', [
            'session_formation' => $sessionFormation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="session_formation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SessionFormation $sessionFormation): Response
    {
        $form = $this->createForm(SessionFormationType::class, $sessionFormation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('session_formation_index', [
                'id' => $sessionFormation->getId(),
            ]);
        }

        return $this->render('session_formation/edit.html.twig', [
            'session_formation' => $sessionFormation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="session_formation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SessionFormation $sessionFormation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sessionFormation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sessionFormation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('session_formation_index');
    }
}

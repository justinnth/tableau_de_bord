<?php

namespace App\Controller;

use App\Entity\EvenementPlanning;
use App\Form\EvenementPlanningType;
use App\Repository\EvenementPlanningRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/evenement/planning")
 */
class EvenementPlanningController extends AbstractController
{
    /**
     * @Route("/", name="evenement_planning_index", methods={"GET"})
     */
    public function index(EvenementPlanningRepository $evenementPlanningRepository): Response
    {
        return $this->render('evenement_planning/index.html.twig', [
            'evenement_plannings' => $evenementPlanningRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="evenement_planning_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $evenementPlanning = new EvenementPlanning();
        $form = $this->createForm(EvenementPlanningType::class, $evenementPlanning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($evenementPlanning);
            $entityManager->flush();

            return $this->redirectToRoute('evenement_planning_index');
        }

        return $this->render('evenement_planning/new.html.twig', [
            'evenement_planning' => $evenementPlanning,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evenement_planning_show", methods={"GET"})
     */
    public function show(EvenementPlanning $evenementPlanning): Response
    {
        return $this->render('evenement_planning/show.html.twig', [
            'evenement_planning' => $evenementPlanning,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="evenement_planning_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EvenementPlanning $evenementPlanning): Response
    {
        $form = $this->createForm(EvenementPlanningType::class, $evenementPlanning);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenement_planning_index', [
                'id' => $evenementPlanning->getId(),
            ]);
        }

        return $this->render('evenement_planning/edit.html.twig', [
            'evenement_planning' => $evenementPlanning,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="evenement_planning_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EvenementPlanning $evenementPlanning): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenementPlanning->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($evenementPlanning);
            $entityManager->flush();
        }

        return $this->redirectToRoute('evenement_planning_index');
    }

    /**
     * @Route("/calendar", name="app_calendar", methods={"GET"})
     */
    public function calendar(): Response
    {
        return $this->render('evenement_planning/calendar.html.twig', []);
    }
}

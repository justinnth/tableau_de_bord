<?php

namespace App\Controller;

use App\Entity\ParentFacilitateur;
use App\Form\ParentFacilitateurType;
use App\Repository\ParentFacilitateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/parent/facilitateur")
 */
class ParentFacilitateurController extends AbstractController
{
    /**
     * @Route("/", name="parent_facilitateur_index", methods={"GET"})
     */
    public function index(ParentFacilitateurRepository $parentFacilitateurRepository): Response
    {
        return $this->render('parent_facilitateur/index.html.twig', [
            'parent_facilitateurs' => $parentFacilitateurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="parent_facilitateur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $parentFacilitateur = new ParentFacilitateur();
        $form = $this->createForm(ParentFacilitateurType::class, $parentFacilitateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($parentFacilitateur);
            $entityManager->flush();

            return $this->redirectToRoute('parent_facilitateur_index');
        }

        return $this->render('parent_facilitateur/new.html.twig', [
            'parent_facilitateur' => $parentFacilitateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parent_facilitateur_show", methods={"GET"})
     */
    public function show(ParentFacilitateur $parentFacilitateur): Response
    {
        return $this->render('parent_facilitateur/show.html.twig', [
            'parent_facilitateur' => $parentFacilitateur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="parent_facilitateur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ParentFacilitateur $parentFacilitateur): Response
    {
        $form = $this->createForm(ParentFacilitateurType::class, $parentFacilitateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parent_facilitateur_index', [
                'id' => $parentFacilitateur->getId(),
            ]);
        }

        return $this->render('parent_facilitateur/edit.html.twig', [
            'parent_facilitateur' => $parentFacilitateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parent_facilitateur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ParentFacilitateur $parentFacilitateur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parentFacilitateur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($parentFacilitateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('parent_facilitateur_index');
    }
}

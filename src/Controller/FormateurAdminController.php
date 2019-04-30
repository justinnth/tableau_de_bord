<?php


namespace App\Controller;


use App\Entity\Formateur;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FormateurAdminController
 * @package App\Controller
 * @IsGranted("ROLE_ADMIN")
 */
class FormateurAdminController extends AbstractController
{
    /**
     * @Route("/admin/formateur/new")
     */
    public function new(EntityManagerInterface $em)
    {
        die('todo');
        $formateur = new Formateur();
        $formateur->setNom("Doe")
            ->setPrenom("John")
            ->setDateDeNaissance(new \DateTime('now'))
            ->setMail("mail@test.com")
            ->setTelephone(609090909)
            ->setMeilleurDiplome("Master")
            ->setSalarie(true)
            ->setFonctionActuelle("Fonction actuelle")
            ->setDomaineExpertise("Domaine expertise")
            ->setModeAcquisition("Mode d'acquisition")
            ->setTypeFormations("Types formations")
            ->setZoneExecution([36.6444, -1.2321])
            ->setFormationIperia(['1', '2', '3']);

        $em->persist($formateur);
        $em->flush();

        return new Response(sprintf(
            "Nouveau formateur => id : #%d nom : %s",
            $formateur->getId(),
            $formateur->getNom()
        ));
    }

}
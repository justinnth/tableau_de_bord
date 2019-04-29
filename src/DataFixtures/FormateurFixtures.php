<?php

namespace App\DataFixtures;

use App\Entity\Formateur;
use Doctrine\Common\Persistence\ObjectManager;

class FormateurFixtures extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Formateur::class, 50, function (Formateur $formateur, $count){
            $formateur->setNom("Doe")
                ->setPrenom("John")
                ->setDateDeNaissance(new \DateTime('now'))
                ->setMail("mail@test".$count.".com")
                ->setTelephone(609090909)
                ->setMeilleurDiplome("Master")
                ->setSalarie(true)
                ->setFonctionActuelle("Fonction actuelle")
                ->setDomaineExpertise("Domaine expertise")
                ->setModeAcquisition("Mode d'acquisition")
                ->setTypeFormations("Types formations")
                ->setZoneExecution([36.6444, -1.2321])
                ->setFormationIperia(['1', '2', '3']);
        });
        $manager->flush();
    }
}

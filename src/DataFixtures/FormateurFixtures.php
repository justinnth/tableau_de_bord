<?php

namespace App\DataFixtures;

use App\Entity\Formateur;
use Doctrine\Common\Persistence\ObjectManager;

class FormateurFixtures extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Formateur::class, 50, function (Formateur $formateur, $count){
            $formateur->setNom($this->faker->lastName)
                ->setPrenom($this->faker->firstName)
                ->setDateDeNaissance($this->faker->dateTimeThisCentury)
                ->setMail($this->faker->email)
                ->setTelephone(111111)
                ->setMeilleurDiplome($this->faker->text)
                ->setSalarie($this->faker->boolean(70))
                ->setFonctionActuelle($this->faker->text)
                ->setDomaineExpertise($this->faker->text)
                ->setModeAcquisition($this->faker->text)
                ->setTypeFormations($this->faker->text)
                ->setZoneExecution($this->faker->shuffleArray([0, 10000]))
                ->setFormationIperia($this->faker->shuffleArray([0, 10000]));
        });
        $manager->flush();
    }
}

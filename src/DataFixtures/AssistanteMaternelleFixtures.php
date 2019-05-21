<?php

namespace App\DataFixtures;

use App\Entity\AssistanteMaternelle;
use Doctrine\Common\Persistence\ObjectManager;

class AssistanteMaternelleFixtures extends BaseFixture
{

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(AssistanteMaternelle::class, 100, function (AssistanteMaternelle $assistanteMaternelle, $count){
            $assistanteMaternelle
                ->setNom($this->faker->lastName)
                ->setNomJeuneFille($this->faker->lastName)
                ->setPrenom($this->faker->firstName)
                ->setDateNaissance($this->faker->dateTimeThisCentury)
                ->setMail($this->faker->email)
                ->setTelephone1(0543273615)
                ->setTelephone2(0623143254)
                ->setAdressePostale($this->faker->text);
        });
        $manager->flush();
    }
}

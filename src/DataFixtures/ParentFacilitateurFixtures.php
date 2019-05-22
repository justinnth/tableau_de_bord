<?php

namespace App\DataFixtures;

use App\Entity\AssistanteMaternelle;
use App\Entity\ParentFacilitateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ParentFacilitateurFixtures extends BaseFixture
{

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(ParentFacilitateur::class, 10, function (ParentFacilitateur $parent, $count){
            $parent->setPrenom($this->faker->firstName)
                ->setNom($this->faker->lastName)
                ->setAssistanteMaternelle(new AssistanteMaternelle());
        });
    }
}

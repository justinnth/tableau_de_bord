<?php

namespace App\DataFixtures;

use App\Entity\EvenementPlanning;
use App\Entity\Formateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EvenementFixtures extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(EvenementPlanning::class, 10, function (EvenementPlanning $evenementPlanning, $count){
            $evenementPlanning->setBeginAt($this->faker->dateTimeThisMonth)
                ->setEndAt($this->faker->dateTimeThisMonth)
                ->setTitle($this->faker->jobTitle)
                ->setFormateur(new Formateur());
        });
    }
}

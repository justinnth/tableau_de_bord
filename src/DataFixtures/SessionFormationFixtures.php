<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use App\Entity\SessionFormation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SessionFormationFixtures extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(SessionFormation::class, 10, function (SessionFormation $sessionFormation, $count){
            $sessionFormation->setTitle($this->faker->jobTitle)
                ->setBeginAt($this->faker->dateTimeThisMonth)
                ->setEndAt($this->faker->dateTimeThisYear())
                ->setFormation(new Formation());
        });
    }
}

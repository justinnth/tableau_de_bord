<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Common\Persistence\ObjectManager;

class FormationFixtures extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Formation::class, 50, function (Formation $formations, $count){
            $formations->setTitre($this->faker->title)
                ->setDuree(14)
                ->setReference("MA41")
                ->setPedagogie($this->faker->text)
                ->setPublicVise($this->faker->text)
                ->setFormateur($this->faker->text)
                ->setPrerequis($this->faker->text)
                ->setLieu($this->faker->text)
                ->setCpf($this->faker->boolean(70))
                ->setPhoto("img")
                ->setLien("leLien")
                ->setFacebook("leFacebook")
                ->setTrameARealiser($this->faker->boolean(70))
                ->setTrameValiderIperia($this->faker->boolean(70));
        });
        $manager->flush();
    }
}

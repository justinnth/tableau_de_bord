<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(User::class, 4, function (User $user, $count){
            $user->setEmail($this->faker->email)
                ->setUsername($this->faker->userName);
        });
        $manager->flush();
    }
}

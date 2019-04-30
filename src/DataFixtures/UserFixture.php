<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends BaseFixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(User::class, 3, function (User $user, $count){
            $user->setEmail($this->faker->email)
                ->setUsername($this->faker->userName)
                ->setPassword($this->passwordEncoder->encodePassword(
                    $user, 'engage'
                ));
        });

        $this->createMany(User::class, 1, function (User $user, $count){
            $user->setEmail("admin@email.com")
                ->setUsername("admin")
                ->setRoles(['ROLE_ADMIN'])
                ->setPassword($this->passwordEncoder->encodePassword(
                    $user, 'admin'
                ));
        });
        $manager->flush();
    }
}

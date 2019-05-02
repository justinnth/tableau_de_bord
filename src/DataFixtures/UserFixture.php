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
        $this->createMany(User::class, 1, function (User $user, $count){
            $user->setEmail("visu@email.com")
                ->setUsername("visu")
                ->setRoles(['ROLE_VISU'])
                ->setPassword($this->passwordEncoder->encodePassword(
                    $user, 'visu'
                ));
        });

        $this->createMany(User::class, 1, function (User $user, $count){
            $user->setEmail("user@email.com")
                ->setUsername("user")
                ->setRoles(['ROLE_UTILISATEUR'])
                ->setPassword($this->passwordEncoder->encodePassword(
                    $user, 'user'
                ));
        });

        $this->createMany(User::class, 1, function (User $user, $count){
            $user->setEmail("formateur@email.com")
                ->setUsername("formateur")
                ->setRoles(['ROLE_FORMATEUR'])
                ->setPassword($this->passwordEncoder->encodePassword(
                    $user, 'formateur'
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

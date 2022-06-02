<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateUser extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('nino@famillebarbier.net');
        $password = $this->hasher->hashPassword($user, 'Wllemoko6019');
        $user->setPassword($password);
        $user->setRoles([
            'ROLE_ADMIN',
            'ROLE_USER'
        ]);
        $manager->persist($user);
        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setLogin('lucas@ld-web.net')
            ->setRoles([UserRole::ADMIN]);

        $user->setPassword($this->encoder->encodePassword(
            $user,
            'blablabla'
        ));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('test@test.com');
        $user->setPassword($this->encoder->encodePassword(
            $user,
            'blablabla'
        ));

        $manager->persist($user);

        $manager->flush();
    }
}

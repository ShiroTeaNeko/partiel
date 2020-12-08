<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for($i = 1; $i <= 10; $i++){
            $artist = new Artist();
            $artist->setName($faker->name())
                ->setPicture("http://placehold.it/350x150");

            $manager->persist($artist);
        }

        $manager->flush();
    }
}

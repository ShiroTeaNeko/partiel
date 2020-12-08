<?php

namespace App\DataFixtures;

use App\Entity\Album;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AlbumFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for($i = 1; $i <= 20; $i++){
            $album = new Album();
            $album->setName($faker->word())
                ->setReleaseYear($faker->numberBetween($min = 1950, $max = 2020))
                ->setCover("http://placehold.it/350x150");

            $manager->persist($album);
        }

        $manager->flush();
    }
}

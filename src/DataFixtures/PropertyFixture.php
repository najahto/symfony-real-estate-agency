<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class PropertyFixture extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();
        $properties = Array();
        for ($i = 0; $i < 50; $i++) {
            $properties[$i] = new Property();
            $properties[$i]->setTitle($faker->words(3,true));
            $properties[$i]->setDescription($faker->paragraph);
            $properties[$i]->setSurface(random_int(40,400));
            $properties[$i]->setBedrooms(random_int(1,8));
            $properties[$i]->setRooms(random_int(2,12));
            $properties[$i]->setFloor(random_int(1,6));
            $properties[$i]->setPrice(random_int(10000,700000));
            $properties[$i]->setHeat(random_int(0,1));
            $properties[$i]->setCity($faker->city);
            $properties[$i]->setAddress($faker->address);
            $properties[$i]->setPostalCode($faker->postcode);
            $properties[$i]->setPostalCode($faker->postcode);

            $manager->persist($properties[$i]);
            $manager->flush();
        }

    }
}

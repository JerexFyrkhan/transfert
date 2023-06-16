<?php

namespace App\DataFixtures;

use App\Entity\Object756;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $users = [];
        for ($i = 0; $i < 4; $i++) {
            $users[$i] = new User();
            $users[$i]->setNom($faker->lastName);
            $users[$i]->setRoles(['ROLE_USER']);

            $manager->persist($users[$i]);
        }

        $objects = [];
        for ($i = 0; $i < 4; $i++) {
            $objects[$i] = new Object756();
            $objects[$i]->setNom($faker->lastName);
            $objects[$i]->setDescription($faker->sentence(45));
            $objects[$i]->setProprietaire($users[$i]);

            $manager->persist($objects[$i]);
        }

        $manager->flush();
    }
}

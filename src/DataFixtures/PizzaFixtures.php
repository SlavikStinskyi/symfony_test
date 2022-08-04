<?php

namespace App\DataFixtures;

use App\Entity\Pizza;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PizzaFixtures
{
    public static function load(ObjectManager $manager) :void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 15; $i++){
            $pizza = new Pizza();
            $pizza->setName($faker->name);
            $pizza->setPrice($faker->numberBetween(100, 300));
            $pizza->setSize($faker->randomElement([36,42,58,64]));
            $pizza->setVegan($faker->boolean());
            $pizza->setGlutenfree($faker->boolean());
            $pizza->setVegetarian($faker->boolean());
            $pizza->setSpicy($faker->boolean());
            $pizza->setSweet($faker->boolean());

            $manager->persist($pizza);
        }

        $manager->flush();
    }
}
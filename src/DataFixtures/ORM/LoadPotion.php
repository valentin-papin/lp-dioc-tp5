<?php

namespace App\DataFixtures\ORM;

use App\Entity\Potion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPotion extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $potions = [
            new Potion('Potion de vitesse', 10, 5),
            new Potion('Potion de force', 30, 3),
            new Potion('Potion de nyctalopie', 50, 2),
            new Potion('Potion de jouissance', 100, 1),
        ];

        foreach ($potions as $potion) {
            $this->addReference($potion->getName(), $potion);
            $manager->persist($potion);
        }

        $manager->flush();
    }
}

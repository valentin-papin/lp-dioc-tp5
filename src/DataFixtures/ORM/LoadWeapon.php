<?php

namespace App\DataFixtures\ORM;

use App\Entity\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadWeapon extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $weapons = [
            new Weapon('shotgun', 100, 5, 3),
            new Weapon('sniper', 100, 0.3, 5),
            new Weapon('m4', 20, 0.2, 10),
            new Weapon('handgun', 25, 1, 3),
        ];

        foreach ($weapons as $weapon) {
            $this->addReference($weapon->getName(), $weapon);
            $manager->persist($weapon);
        }

        $manager->flush();
    }
}

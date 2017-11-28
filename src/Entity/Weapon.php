<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Weapon
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column()
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $damage;

    /**
     * @ORM\Column(type="decimal")
     */
    private $damageDistanceCoef;

    /**
     * @ORM\Column(type="integer")
     */
    private $fireRate;

    public function __construct(string $name, int $damage, float $damageRangeCoef, int $fireRate)
    {
        $this->name = $name;
        $this->damage = $damage;
        $this->damageDistanceCoef = $damageRangeCoef;
        $this->fireRate = $fireRate;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function getDamageDistanceCoef(): float
    {
        return $this->damageDistanceCoef;
    }

    public function getFireRate(): int
    {
        return $this->fireRate;
    }
}

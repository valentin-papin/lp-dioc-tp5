<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Potion
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
    private $limite;

    /**
     * @ORM\Column(type="integer")
     */
    private $healthPoint;

    /**
     * Potion constructor.
     * @param $name
     * @param $limit
     * @param $healthPoint
     */
    public function __construct($name, $limite, $healthPoint)
    {
        $this->name = $name;
        $this->limite = $limite;
        $this->healthPoint = $healthPoint;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLimite()
    {
        return $this->limite;
    }

    /**
     * @param mixed $limite
     */
    public function setLimite($limite)
    {
        $this->limite = $limite;
    }

    /**
     * @return mixed
     */
    public function getHealthPoint()
    {
        return $this->healthPoint;
    }

    /**
     * @param mixed $healthPoint
     */
    public function setHealthPoint($healthPoint)
    {
        $this->healthPoint = $healthPoint;
    }
}
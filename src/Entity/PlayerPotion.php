<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PlayerPotion {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="Potion")
     */
    private $potion;

    /**
     * @ORM\ManyToOne(targetEntity="Player")
     */
    private $player;

    /**
     * @return mixed
     */
    public function getPotion()
    {
        return $this->potion;
    }

    /**
     * @param mixed $potions
     */
    public function setPotion($potion)
    {
        $this->potion = $potion;
    }

    /**
     * @return mixed
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param mixed $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }
}
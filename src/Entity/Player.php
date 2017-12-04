<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @UniqueEntity(fields="name", message="Ce nom a déjà été pris.")
 */
class Player
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column()
     * @Assert\Length(
     * min = 4,
     * max = 20,
     * minMessage = "Le nom doit faire au moins {{ limit }} caractères.",
     * maxMessage = "Le nom doit faire moins de {{ limit }} caractères."
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $healthPoint = 100;

    /**
     * @ORM\ManyToOne(targetEntity="Weapon")
     */
    private $currentWeapon;

    /**
     * @ORM\OneToMany(targetEntity="PlayerPotion",mappedBy="player")
     */
    private $playerPotions;

    /**
     * Player constructor.
     */
    public function __construct()
    {
        $this->playerPotions = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getPlayerPotions():Collection
    {
        return $this->playerPotions;
    }

    public function addPlayerPotion(PlayerPotion $playerPotion){
        if($this->playerPotions->contains($playerPotion)){
            return;
        }
        else {
            $this->playerPotions->add($playerPotion);
            $playerPotion->setPlayer($this);
        }

    }

    public function removePlayerPotion(PlayerPotion $playerPotion){
        $this->playerPotions->removeElement($playerPotion);
    }

    /**
     * @param mixed $potions
     */
    public function setPlayerPotions($playerPotions)
    {
        foreach ($playerPotions as $playerPotion){
            $this->$playerPotions->add($playerPotion);
        }
        $this->playerPotions = $playerPotions;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getHealthPoint()
    {
        return $this->healthPoint;
    }

    public function setHealthPoint(int $healthPoint)
    {
        $this->healthPoint = $healthPoint;
    }

    public function getCurrentWeapon(): ?Weapon
    {
        return $this->currentWeapon;
    }

    public function setCurrentWeapon(?Weapon $currentWeapon)
    {
        $this->currentWeapon = $currentWeapon;
    }
}

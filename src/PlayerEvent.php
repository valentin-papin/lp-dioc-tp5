<?php

namespace App;

use Symfony\Component\EventDispatcher\Event;

class PlayerEvent extends Event
{
    private $player;

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
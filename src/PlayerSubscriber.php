<?php

namespace App;

use App\AppEvent;
use App\PlayerEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PlayerSubscriber implements EventSubscriberInterface
{
    private $manager;

    public function __construct($manager)
    {
        $this->manager = $manager;
    }

    public static function getSubscribedEvents()
    {
        return array(
            AppEvent::PLAYER_ADD => 'playerAdd'
        );
    }

    public function playerAdd(PlayerEvent $playerEvent){
        $player = $playerEvent->getPlayer();

        $this->manager->persist($player);
        $this->manager->flush();

        var_dump($player->getName());
    }
}
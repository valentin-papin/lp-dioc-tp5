<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\AppEvent;

class PlayerController extends Controller
{
    /**
     * @Route(path="/", name="player_list")
     */
    public function indexAction()
    {
        $players = $this->getDoctrine()->getRepository(Player::class)->findAll();

        return $this->render('Player/index.html.twig', ['players' => $players]);
    }

    /**
     * @Route(path="/new-player", name="player_new")
     */
    public function newAction(Request $request)
    {
        $player = $this->get(Player::class);
        $form = $this->createForm(PlayerType::class, $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $playerEvent = $this->get('app.player.event');
            $playerEvent->setPlayer($player);

            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch(AppEvent::PLAYER_ADD, $playerEvent);

            return $this->redirectToRoute('player_list');
        }

        return $this->render('Player/new.html.twig', ['form' => $form->createView()]);
    }
}

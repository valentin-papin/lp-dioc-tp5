<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\PlayerType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    public function newAction(Request $request, EntityManager $manager)
    {
        $form = $this->createForm(PlayerType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $player = $form->getData();

            $manager->persist($player);
            $manager->flush();

            return $this->redirectToRoute('player_list');
        }

        return $this->render('Player/new.html.twig', ['form' => $form->createView()]);
    }
}

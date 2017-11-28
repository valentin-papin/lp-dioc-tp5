<?php

namespace App\Form;

use App\Entity\Player;
use App\Fight\Fight;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FightType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'player',
                EntityType::class,
                [
                    'class' => Player::class,
                    'choice_label' => function (Player $player) {
                        return $player->getName().
                            ' -  '.
                            $player->getCurrentWeapon()->getName();
                    },
                    'multiple' => false,
                    'expanded' => false,
                ]
            )
            ->add(
                'distance',
                IntegerType::class
            )
            ->add(
                'target',
                EntityType::class,
                [
                    'class' => Player::class,
                    'choice_label' => function (Player $player) {
                        return $player->getName().
                            ' -  '.
                            $player->getHealthPoint();
                    },
                    'multiple' => false,
                    'expanded' => false,
                ]
            )
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => Fight::class]);
    }
}

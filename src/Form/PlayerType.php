<?php

namespace App\Form;

use App\Entity\Player;
use App\Entity\Weapon;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('currentWeapon', EntityType::class, [
                'class' => Weapon::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
            ])
            ->addEventListener( FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'))
            ->add('submit', SubmitType::class)
        ;
    }

    public function onPreSetData(FormEvent $event)
    {


/*        if ($player->getId() !== null) {
            $form->remove('name');
        }*/
    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => Player::class]);
    }
}

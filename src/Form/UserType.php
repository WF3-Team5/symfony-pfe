<?php

namespace App\Form;

use App\Entity\Departement;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends SimpleUserType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder

            ->add(
                'plainPassword',
                // 2 champs qui doivent avoir la même valeur
                RepeatedType::class,
                [
                    // ... de type password
                    'type' => PasswordType::class,
                    // options du 1er des 2 champs
                    'first_options' => [
                        'label' => 'Mot de passe :',
                        'attr' => [
                            'class' => 'intro_input w-100'
                        ]
                    ],
                    // options du 2e champ
                    'second_options' => [
                        'label' => 'Confirmation du mot de passe',
                        'attr' => [
                            'class' => 'intro_input w-100'
                        ]
                    ],
                    // message si les 2 champs n'ont pas la même valeur
                    'invalid_message' => 'La confirmation ne correspond pas au mot de passe'
                ]
            )
            ->add(
                'numeroSecu',
                TextType::class,
                [
                    'label' => 'Numéro de Sécurité sociale :',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
        ;
    }

}

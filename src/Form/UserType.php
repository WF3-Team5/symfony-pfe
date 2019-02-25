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

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'civility',
                ChoiceType::class,
                [
                    'label' => 'Civilité :',
                    'choices' => [
                        'M' => 'M',
                        'Mme' => 'Mme',
                    ],
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]

            )
            /*->add(
                'gender',
                ChoiceType::class,
                [
                    'label' => 'Sexe :',
                    'choices' => [
                        'Homme' => 'H',
                        'Femme' => 'F'
                    ]
                ]
            )*/
            ->add(
                'last_name',
                TextType::class,
                [
                    'label' => 'Nom :',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
            ->add(
                'first_name',
                TextType::class,
                [
                    'label' => 'Prénom :',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
            ->add(
                'birth_name',
                TextType::class,
                [
                    'label' => 'Nom de naissance :',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
            ->add(
                'birth_date',
                DateType::class,
                [
                    'label' => 'Date de naissance :',
                    'years' => range(1900, date('Y')),
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
            ->add(
                'birth_department',
                EntityType::class,
                [
                    'label' => 'Département de naissance :',
                    'class' => Departement::class,
                    'choice_label' => 'nom',
                    'placeholder' => 'Département',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
            ->add(
                'place_of_birth',
                TextType::class,
                [
                    'label' => 'Lieu de naissance :',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
            ->add(
                'nationality',
                TextType::class,
                [
                    'label' => 'Nationalité :',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
            ->add(
                'email',
                TextType::class,
                [
                    'label' => 'Email :',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
            ->add(
                'address',
                TextType::class,
                [
                    'label' => 'Adresse :',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
            ->add(
                'postal_code',
                IntegerType::class,
                [
                    'label' => 'Code postal :',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]

            )
            ->add(
                'city',
                TextType::class,
                [
                    'label' => 'Ville :',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
            ->add(
                'phone_number',
                TextType::class,
                [
                    'label' => 'Téléphone:',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
            ->add(
                'mobile_phone_number',
                TextType::class,
                [
                    'label' => 'Téléphone mobile :',
                    'attr' => [
                        'class' => 'intro_input w-100'
                    ]
                ]
            )
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

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

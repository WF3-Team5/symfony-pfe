<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PraticienType extends AbstractType
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
                    'label' => 'Nom :'
                ]
            )
            ->add(
                'first_name',
                TextType::class,
                [
                    'label' => 'Prénom :'
                ]
            )
            /*->add(
                'birth_name',
                TextType::class,
                [
                    'label' => 'Nom de naissance :'
                ]
            )*/
            ->add(
                'birth_date',
                DateType::class,
                [
                    'label' => 'Date de naissance :'
                ]
            )
            ->add(
                'birth_department',
                EntityType::class,
                [
                    'label' => 'Département de naissance :',
                    'class' => Departement::class,
                    'choice_label' => 'nom',
                    'placeholder' => 'Département'
                ]
            )
            ->add(
                'place_of_birth',
                TextType::class,
                [
                    'label' => 'Lieu de naissance :'
                ]
            )
            ->add(
                'nationality',
                TextType::class,
                [
                    'label' => 'Nationalité :'
                ]
            )
            ->add(
                'email_pro',
                TextType::class,
                [
                    'label' => 'Email :'
                ]
            )
            ->add(
                'address_pro',
                TextType::class,
                [
                    'label' => 'Adresse :'
                ]
            )
            ->add(
                'postal_code_pro',
                IntegerType::class,
                [
                    'label' => 'Code postal :'
                ]

            )
            ->add(
                'city',
                TextType::class,
                [
                    'label' => 'Ville :'
                ]
            )
            ->add(
                'phone_number_pro',
                TextType::class,
                [
                    'label' => 'Téléphone:'
                ]
            )
            ->add(
                'mobile_phone_number_pro',
                TextType::class,
                [
                    'label' => 'Téléphone mobile :'
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
                        'label' => 'Mot de passe :'
                    ],
                    // options du 2e champ
                    'second_options' => [
                        'label' => 'Confirmation du mot de passe'
                    ],
                    // message si les 2 champs n'ont pas la même valeur
                    'invalid_message' => 'La confirmation ne correspond pas au mot de passe'
                ]
            )
            ->add(
                'RPPS',
                TextType::class,
                [
                    'label' => 'RPPS :'
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
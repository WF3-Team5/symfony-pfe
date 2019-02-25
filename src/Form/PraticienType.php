<?php

namespace App\Form;

use App\Entity\Departement;
use App\Entity\Praticien;
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
                    ],
                    'attr' => array('class'=>'intro_input')
                ]

            )
            ->add(
                'last_name',
                TextType::class,
                [
                    'label' => 'Nom :',
                    'attr' => array('class'=>'intro_input')
                ]

            )
            ->add(
                'first_name',
                TextType::class,
                [
                    'label' => 'Prénom :',
                    'attr' => array('class'=>'intro_input')
                ]
            )
            ->add(
                'birth_date',
                DateType::class,
                [
                    'label' => 'Date de naissance :',
                    'years' => range(1920, date('Y')),
                    'format'=>'dd MM yyyy',
                ]
            )


            ->add(
                'email_pro',
                TextType::class,
                [
                    'label' => 'Email :',
                    'attr' => array('class'=>'intro_input')
                ]
            )
            ->add(
                'email_secretariat',
                TextType::class,
                [
                    'label' => 'Email Secrétariat :',
                    'attr' => array('class'=>'intro_input')
                ]
            )
            ->add(
                'address_pro',
                TextType::class,
                [
                    'label' => 'Adresse :',
                    'attr' => array('class'=>'intro_input')
                ]
            )
            ->add(
                'postal_code_pro',
                IntegerType::class,
                [
                    'label' => 'Code postal :',
                    'attr' => array('class'=>'intro_input')
                ]

            )
            ->add(
                'city_pro',
                TextType::class,
                [
                    'label' => 'Ville :',
                    'attr' => array('class'=>'intro_input')
                ]
            )
            ->add(
                'phone_number_pro',
                TextType::class,
                [
                    'label' => 'Téléphone:',
                    'attr' => array('class'=>'intro_input')
                ]
            )
            ->add(
                'mobile_phone_number_pro',
                TextType::class,
                [
                    'label' => 'Téléphone mobile :',
                    'attr' => array('class'=>'intro_input')
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
                        'attr' => array('class'=>'intro_input')
                    ],
                    // options du 2e champ
                    'second_options' => [
                        'label' => 'Confirmation du mot de passe',
                        'attr' => array('class'=>'intro_input')
                    ],
                    // message si les 2 champs n'ont pas la même valeur
                    'invalid_message' => 'La confirmation ne correspond pas au mot de passe',
                ]
            )
            ->add(
                'RPPS',
                TextType::class,
                [
                    'label' => 'RPPS :',
                    'attr' => array('class'=>'intro_input')
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Praticien::class,
        ]);
    }
}

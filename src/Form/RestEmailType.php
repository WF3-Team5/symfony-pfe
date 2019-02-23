<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RestEmailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plainPassword',
                RepeatedType::class, [
                    "type"=>PasswordType::class,
                    "first_options"=>[
                        "label"=>"Mot de passe",
                    ],
                    "second_options"=>[
                        "label"=>"Confirmation du mot de passe",
                    ],
                    "invalid_message" => "La confirmation ne correspond pas au mot de passe!"
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

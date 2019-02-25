<?php

namespace App\Form;

use App\Entity\Praticien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Praticien1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civility')
            ->add('last_name')
            ->add('first_name')
            ->add('birth_date')
            ->add('birth_department')
            ->add('place_of_birth')
            ->add('nationality')
            ->add('email_pro')
            ->add('email_secretariat')
            ->add('address_pro')
            ->add('postal_code_pro')
            ->add('city_pro')
            ->add('phone_number_pro')
            ->add('mobile_phone_number_pro')
            ->add('password')
            ->add('plainPassword')
            ->add('role')
            ->add('dateInscription')
            ->add('etat')
            ->add('RPPS')
            ->add('speciality')
            ->add('hash')
            ->add('hashValidity')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Praticien::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginAt', DateTimeType::class, [
                'label' =>"Débuter à:",

                'widget' => 'single_text',

                'html5'=>false,

                // adds a class that can be selected in JavaScript
                'attr' => ['class' => 'datetimepicker', 'id'=>'stdatetimepicker']])

            ->add('endAt', DateTimeType::class, [
                'label'=>'fin',

                'widget' => 'single_text',

                'html5'=>false,

                // adds a class that can be selected in JavaScript
                'attr' => ['class' => 'datetimepicker', 'id'=>'enddatetimepicker']])
            //->add('title')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}

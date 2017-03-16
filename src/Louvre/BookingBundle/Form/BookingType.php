<?php

namespace Louvre\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateOfVisit', DateType::class, array(
                "label" => "Date de votre visite:",
                /*"widget" => "single_text",*/
                /*"html5" => false,*/
                /*"format" => "MM-dd-yyyy",*/ // Y/m/d MM-dd-yyyy yyyy-MM-dd
                /*"placeholder" => array("year" => "Année", "month" => "Mois", "day" => "Jour"),*/
                /*"attr" => array(
                    "class" => "datepicker"
                )*/
                // TODO add constraint "check 1000 tickets" here
                ))
            ->add('durationOfVisit', ChoiceType::class, array(
                'label' => 'Billet journée entière ou demi-journée?',
                'choices'  => array(
                    'Demi-journée' => false,
                    'Journée' => true,
                ),
            ))
            ->add('numberOfTickets', IntegerType::class, array(
                "label" => "Nombre de billets"
            ))
            ->add('clientEmail', EmailType::class, array(
                "label" => "Votre adresse email"
            ))
            ->add("submit", SubmitType::class, array(
                "label" => "Réserver"
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Louvre\BookingBundle\Entity\Booking'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'louvre_bookingbundle_booking';
    }


}

<?php

namespace Louvre\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingSecondStepType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("visitors", CollectionType::class, array(
                "entry_type" => VisitorsType::class,
                "label" => "Les visiteurs pour votre réservation:",
                "attr" => array(
                    "id" => "visitors"
                )
            ))
            ->add("Revenir à l'étape d'avant", ButtonType::class, array(
                "attr" => array(
                    "label" => "Retour",
                    "class" => "btn btn-info btn-block retourPageOne"
                )
            ))
            ->add("submit", SubmitType::class, array(
                "label" => "Réserver",
                "attr" => array(
                    "class" => "btn btn-primary btn-block"
                )
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
}

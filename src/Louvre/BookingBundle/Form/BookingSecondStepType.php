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
            /*->add("Revenir à l'étape précédente", SubmitType::class, array(
                "attr" => array(
                    'validation_groups' => false,
                    "class" => "btn btn-info btn-block retourPageOne", "href" => "http://localhost:8888/oc_louvre_symfony/web/app_dev.php/newbooking"
                )
            ))*/
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

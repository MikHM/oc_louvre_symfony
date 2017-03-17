<?php

namespace Louvre\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VisitorsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array(
                "label" => "Prénom",
                "attr" => array(
                    "class" => "form-control form-group"
                )
            ))
            ->add('lastName' , TextType::class, array(
                "label" => "Nom",
                "attr" => array(
                    "class" => "form-control form-group mb-2 mr-sm-2 mb-sm-2"
                )
            ))
            ->add('country', CountryType::class, array(
                "label" => "Pays",
                "attr" => array(
                    "class" => "form-control form-group mb-2 mr-sm-2 mb-sm-2"
                )
            ))
            ->add('dateOfBirth', BirthdayType::class, array(
                "label" => "Date de naissance",
                "attr" => array(
                    "class" => "form-control form-group mb-2 mr-sm-2 mb-sm-0"
                )
            ))
            ->add('discount', ChoiceType::class, array(
                'label' => 'Tarif réduit?',
                'choices'  => array(
                    'Non' => false,
                    'Oui' => true,
                ),
                "attr" => array(
                    "class" => "form-control form-group mb-2 mr-sm-2 mb-sm-0"
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
            'data_class' => 'Louvre\BookingBundle\Entity\Visitors'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'louvre_bookingbundle_visitors';
    }


}

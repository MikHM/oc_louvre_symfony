<?php


namespace Louvre\BookingBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * Class After2PM
 * @package Louvre\BookingBundle\Validator\Constraints
 */
class After2PM extends Constraint
{
    public $message = "Un billet journée n'est pas réservable pour le jour même apres 14h.";
}
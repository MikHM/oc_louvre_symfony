<?php

namespace Louvre\BookingBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * Class Check1000TicketsLimit
 * @package Louvre\BookingBundle\Validator\Constraints
 */
class Check1000TicketsLimit extends Constraint
{
    public $message = "Désolé il n'y a plus de billets disponibles pour cette date.";
}
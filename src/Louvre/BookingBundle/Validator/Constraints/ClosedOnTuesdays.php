<?php

namespace Louvre\BookingBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * Class ClosedOnTuesdays
 * @package Louvre\BookingBundle\Validator\Constraints
 */
class ClosedOnTuesdays extends Constraint
{
    public $message = "Le musée est fermé le mardi.";

}
<?php

namespace Louvre\BookingBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * Class NoBookingOnSundays
 * @package Louvre\BookingBundle\Validator\Constraints
 */
class NoBookingOnSundays extends Constraint
{
    public $message = "Pas de réservation possible pour les dimanches.";
}


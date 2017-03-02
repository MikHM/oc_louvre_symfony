<?php


namespace Louvre\BookingBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * Class ClosedForBankHolidays
 * @package Louvre\BookingBundle\Validator\Constraints
 */
class ClosedForBankHolidays extends Constraint
{
    public $message = "Le musée est fermé les 1er mai, 1er novembre et 25 décembre.";
}
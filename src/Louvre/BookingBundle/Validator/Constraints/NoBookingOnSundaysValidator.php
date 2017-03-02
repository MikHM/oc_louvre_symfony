<?php

namespace Louvre\BookingBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class NoBookingOnSundaysValidator extends ConstraintValidator
{
    public function validate($dateOfVisit, Constraint $constraint)
    {
        $visitorPickedTime = $dateOfVisit->getTimestamp();
        $visitorPickedDay = date("D", $visitorPickedTime);

        if ($visitorPickedDay == "Sun")
        {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }

}
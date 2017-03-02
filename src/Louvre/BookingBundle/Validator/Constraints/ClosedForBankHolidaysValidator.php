<?php

namespace Louvre\BookingBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ClosedForBankHolidaysValidator extends ConstraintValidator
{
    public function validate($dateOfVisit, Constraint $constraint)
    {
        $visitorPickedTime = $dateOfVisit->getTimestamp();
        $visitorPickedDay = date("d-m", $visitorPickedTime);

        if (($visitorPickedDay == "01-05") || ($visitorPickedDay == "01-11") || ($visitorPickedDay == "25-12"))
        {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }

}
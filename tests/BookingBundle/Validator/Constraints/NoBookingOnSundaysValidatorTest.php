<?php

namespace tests\BookingBundle\Validator\Constraints;

use Louvre\BookingBundle\Validator\Constraints\NoBookingOnSundaysValidator;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Symfony\Component\Validator\Constraint;

class NoBookingOnSundaysValidatorTest extends TestCase
{
    public function testValidate()
    {
        $test = new NoBookingOnSundaysValidator();
        $constraint = new Constraint();

        $result = $test->validate(2017-03-26, $constraint);

        $this->assertEquals("Pas de réservation possible pour les dimanches.", $result);
    }

}
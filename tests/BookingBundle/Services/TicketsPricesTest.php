<?php

namespace tests\BookingBundle\Services;

use Louvre\BookingBundle\Entity\Booking;
use Louvre\BookingBundle\Services\TicketsPrices;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;


class TicketsPricesTest extends TestCase
{
    public function testSetVisitorsTicketPrice()
    {
        $calc = new TicketsPrices();

        $booking = new Booking();

        $booking->setNumberOfTickets(1);
        $booking->getVisitor();


        $result = $calc->setVisitorsTicketPrice($booking);

        $this->assertEquals("", $result);
    }
}
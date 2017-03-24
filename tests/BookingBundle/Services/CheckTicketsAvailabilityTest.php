<?php

namespace Louvre\BookingBundle\Tests\BookingBundle\Services;

use Doctrine\ORM\EntityManager;
use Louvre\BookingBundle\Services\CheckTicketsAvailability;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class CheckTicketsAvailabilityTest extends TestCase
{
    public function test__construct(EntityManager $entityManager)
    {
        
    }
    public function testSelectedDayTickets()
    {
        $ticketsNumber = new CheckTicketsAvailability();
        $result = $ticketsNumber->selectedDayTickets(2017-12-12);

        $this->assertEquals(0, $result);
    }

}
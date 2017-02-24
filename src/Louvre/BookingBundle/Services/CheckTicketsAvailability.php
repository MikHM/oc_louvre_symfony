<?php

namespace Louvre\BookingBundle\Services;


use Doctrine\ORM\EntityManager;


// TODO add this into the Assertions
class CheckTicketsAvailability
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function selectedDayTickes($dayToBeChecked)
    {
        // fetches the BookingRepository custom method
        $bookings = $this->em->getRepository("BookingBundle:Booking")->getNumberOfBookingsPerDay($dayToBeChecked);

        // will be used for total of tickets
        $ticketsPerBooking = 0;

        foreach ($bookings as $booking)
        {
            $ticketsPerBooking += $booking->getNumberOfBookingsPerDay();
        }

        return $ticketsPerBooking;
        
    }

}
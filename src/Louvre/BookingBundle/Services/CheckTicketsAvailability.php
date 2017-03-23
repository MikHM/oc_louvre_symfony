<?php

namespace Louvre\BookingBundle\Services;


use Doctrine\ORM\EntityManager;


class CheckTicketsAvailability
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function selectedDayTickets($dayToBeChecked)
    {
        // fetches the BookingRepository custom method
        $bookings = $this->em->getRepository("BookingBundle:Booking")->getNumberOfBookingsPerDay($dayToBeChecked);

        // will be used for total of tickets
        $ticketsPerBooking = 0;

        foreach ($bookings as $booking)
        {
            if ($booking->getPaid() == true )
            {
                $ticketsPerBooking += $booking->getNumberOfTickets();
            }
        }

        return $ticketsPerBooking;
        
    }

}
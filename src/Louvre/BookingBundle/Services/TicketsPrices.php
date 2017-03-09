<?php

namespace Louvre\BookingBundle\Services;


use Doctrine\ORM\EntityManager;
use Louvre\BookingBundle\Entity\Booking;

class TicketsPrices
{
    /*private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }*/

    public function setVisitorsTicketPrice(Booking $reservation)
    {
        $total = 0;

        $currentDay = new \DateTime();

        foreach($reservation->getVisitors() as $visitor)
        {
            // From visitor's BD to current date, get his age
            $computeAge = date_diff($currentDay, $visitor->getDateOfBirth());
            $visitorAge = $computeAge->format("%y");

            // Setting tickets price
            if ($visitor->getDiscount())  // tarif réduit
            {
                $visitor->setTicketPrice(10);
            }
            elseif ( $visitorAge >= 4 && $visitorAge < 12) // tarif enfant
            {
                $visitor->setTicketPrice(8);
            }
            elseif ( $visitorAge >= 12 && $visitorAge < 60) // tarif normal
            {
                $visitor->setTicketPrice(16);
            }
            elseif ( $visitorAge > 60 ) // tarif senior
            {
                $visitor->setTicketPrice(12);
            }

            $total += $visitor->getTicketPrice();
        }

        $reservation->setTotalBookingPrice($total);

        return $reservation;
    }

}
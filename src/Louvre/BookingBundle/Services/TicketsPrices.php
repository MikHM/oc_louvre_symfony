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
            $coef = ($reservation->getDurationOfVisit())? 1 : 0.5;

            // Setting tickets price
            if ($visitor->getDiscount() && $visitorAge >= 12)  // tarif réduit
            {
                $visitor->setTicketPrice(10 * $coef);
            }
            elseif ( $visitorAge >= 4 && $visitorAge < 12) // tarif enfant
            {
                $visitor->setTicketPrice(8  * $coef);
            }
            elseif ( $visitorAge > 12 && $visitorAge <= 60) // tarif normal
            {
                $visitor->setTicketPrice(16  * $coef);
            }
            elseif ( $visitorAge > 60 ) // tarif senior
            {
                $visitor->setTicketPrice(12  * $coef);
            }

            $total += $visitor->getTicketPrice();
        }

        $halfDay = $reservation->getDateOfVisit();


        $reservation->setTotalBookingPrice($total);

        return $reservation;
    }

}
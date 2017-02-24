<?php

namespace Louvre\BookingBundle\Services;


use Doctrine\ORM\EntityManager;

class TicketsPrices
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function setVisitorsTicketPrice( )
    {
        // TODO Find a way to get $discount in here
        $ticketPrice = 0;
        // find a way to calculate each visitor's age.
        $visitorAge = null; // From visitor's BD to current date?!

        // add a if else statement to set the tickets price.
        if ($discount)  // tarif réduit
        {
            $ticketPrice = 10;
        }
        elseif ( $visitorAge >= 4 && $visitorAge < 12) // tarif enfant
        {
            $ticketPrice = 8;
        }
        elseif ( $visitorAge >= 12 && $visitorAge < 60) // tarif normal
        {
            $ticketPrice = 16;
        }
        elseif ( $visitorAge > 60 ) // tarif senior
        {
            $ticketPrice = 12;
        }


        return $ticketPrice;
    }

}
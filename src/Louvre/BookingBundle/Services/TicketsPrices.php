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

    }

}
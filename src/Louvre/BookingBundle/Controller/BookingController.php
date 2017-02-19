<?php

namespace Louvre\BookingBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookingController extends Controller
{
    /**
     * @Route("/newbooking", name="newbooking")
     */
    public function newBookingAction()
    {
        return $this->render("@Booking/Booking/newbooking.html.twig");
    }

}
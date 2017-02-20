<?php

namespace Louvre\BookingBundle\Controller;


use Louvre\BookingBundle\Entity\Booking;
use Louvre\BookingBundle\Form\BookingType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookingController extends Controller
{
    /**
     * @Route("/newbooking", name="newbooking")
     */
    public function newBookingAction(Request $request)
    {
        $newBooking = new Booking();

        $form = $this->createForm(BookingType::class, $newBooking, array(
            "action"=>$this->generateUrl("newbooking"),
            "method"=>"POST",
            "attr" => [
                "id" => "myform",
                "class" => "group"
            ]
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newBooking);
            $em->flush();

            return $this->redirectToRoute("newbooking");
        }

        $formView = $form->createView();

        return $this->render("@Booking/Booking/newbooking.html.twig", array(
            "form" => $formView
        ));
    }

}
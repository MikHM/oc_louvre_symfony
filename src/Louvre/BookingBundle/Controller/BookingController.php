<?php

namespace Louvre\BookingBundle\Controller;


use Louvre\BookingBundle\Entity\Booking;
use Louvre\BookingBundle\Entity\Visitors;
use Louvre\BookingBundle\Form\BookingSecondStepType;
use Louvre\BookingBundle\Form\BookingType;
use Louvre\BookingBundle\Form\VisitorsType;
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

            return $this->redirectToRoute("tickets", array(
                "id" => $newBooking->getId(),
                "amount" => $newBooking->getNumberOfTickets()
            ));
        }

        $formView = $form->createView();

        return $this->render("@Booking/Booking/newbooking.html.twig", array(
            "form" => $formView
        ));
    }



    /**
     * @Route("/tickets/{id}/{amount}", name="tickets")
     */
    public function ticketsAction(Request $request, Booking $reservation, $amount)
    {
        $em = $this->getDoctrine()->getManager();

        for ($i = 0; $i < $amount; $i++)
        {
            $newVisitor = new Visitors();
            $reservation->addVisitor($newVisitor);
        }

        // TODO erase and add to the view
        $form = $this->createForm(BookingSecondStepType::class, $reservation, array(
            "attr" => [
                "id" => "myform",
                "class" => "group"
            ]
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            // TODO how about adding the ticket price here?
            $setTicketPrice = $this->get("tickets_price");
            $price = $setTicketPrice->setVisitorsTicketPrice($reservation);


            $em->flush();

            return $this->redirectToRoute("booking_summary", array(
                "id" => $reservation->getId()
            ));

        }

        return $this->render("@Booking/Booking/tickets.html.twig", array(
            "reservation" => $reservation,
            "form" => $form->createView()
        ));
        
    }


    /**
     * @Route("/bookingSummary/{id}", name="booking_summary")
     */
    public function summaryAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $booking = $em->getRepository("BookingBundle:Booking")->find($id);


        return $this->render("@Booking/Booking/bookingSummary.html.twig", array(
            "booking" => $booking
        ));
    }


    /**
     * @Route("/bookingCheckout", name="booking_checkout")
     */
    public function checkoutAction()
    {
        return $this->render("@Booking/Booking/bookingCheckout.html.twig");
    }

}
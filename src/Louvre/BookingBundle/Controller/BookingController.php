<?php

namespace Louvre\BookingBundle\Controller;


use Louvre\BookingBundle\Entity\Booking;
use Louvre\BookingBundle\Entity\Visitors;
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
    public function ticketsAction(Request $request, $id, $amount)
    {
        $repository = $this->getDoctrine()->getRepository("BookingBundle:Booking");

        $reservation = $repository->find($id);

        $newVisitor = new Visitors();

        /*for ($i = 0; $i < $amount; $i++)
        {

        }*/

        $form = $this->createForm(VisitorsType::class, $newVisitor, array(
            "method"=>"POST",
            "attr" => [
                "id" => "myform",
                "class" => "group"
            ]
        ));

        $formView = $form->createView();


        return $this->render("@Booking/Booking/tickets.html.twig", array(
            "reservation" => $reservation,
            "form" => $formView
        ));
        
    }

}
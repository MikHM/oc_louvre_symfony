<?php

namespace Louvre\BookingBundle\Services;



use Louvre\BookingBundle\Entity\Booking;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Templating\TemplatingExtension;
use Symfony\Component\Templating\EngineInterface;

class SendBookingByEmail
{
    // Will need mailer service to send the mail, duhh!!!
    private $mailer;
    private $template;


    public function __construct(\Swift_Mailer $mailer,  EngineInterface $template)
    {
        $this->template = $template;
        $this->mailer = $mailer;
    }

    public function bookingMail(Booking $booking)
    {
        $clientEmail = $booking->getClientEmail();

        $bookingEmail = \Swift_Message::newInstance()
            ->setSubject("Vos billets pour le Louvre")
            ->setFrom("service_reservation@museedulouvre.fr")
            ->setTo($clientEmail)
            ->setBody(
                $this->template->render("@Booking/Booking/bookingEmail.html.twig", array(
                    "totalBookingPrice" => $booking->getTotalBookingPrice(),
                    "dateOfVisit" => $booking->getDateOfVisit(),
                    "visitors" => $booking->getVisitors(),
                    "bookingCode" => $booking->getBookingCodeNumber()
                )),
                "text/html"
            )
            ;

        $this->mailer->send($bookingEmail);
    }

}
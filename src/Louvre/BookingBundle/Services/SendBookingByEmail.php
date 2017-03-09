<?php

namespace Louvre\BookingBundle\Services;



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
        $this->mailer = $mailer;
    }

    public function bookingMail()
    {


        $booking = \Swift_Message::newInstance()
            // TODO: Content of the message goes here
            ->setSubject("Vos billets pour le Louvre")
            ->setFrom("service_reservation@museedulouvre.fr")
            ->setTo("/* visitor @ here */")
            /*->setBody(
                $this->template->render("booking")
            )*/
            ;

        $this->mailer->send($booking);

    }

}
<?php


namespace Louvre\BookingBundle\Services;


class PayementByStripe
{
    public function BookingPayement($stripeKey, $bookingPrice)
    {
        \Stripe\Stripe::setApiKey($stripeKey);

        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create(array(
            "amount" => $bookingPrice, // Amount in cents
            "currency" => "eur",
            "source" => $token,
            "description" => "Paiement pour votre réservation au Musée du Louvre"
        ));

        return $charge;
    }
}